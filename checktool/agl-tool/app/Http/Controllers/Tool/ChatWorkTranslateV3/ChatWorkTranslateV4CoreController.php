<?php

namespace App\Http\Controllers\Tool\ChatWorkTranslateV3;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Controllers\Tool\TranslationCore\TranslationCoreController;
use App\Http\Controllers\Tool\ChatWorkTranslateV3\ChatWorkCoreController;


use App\ToolChatworkConfigs;
use App\ToolChatworkMessages;
use App\ToolChatworkRooms;

class ChatWorkTranslateV4CoreController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('tool/chatwork_translate_v3/cronjobv4');
    }

    private $dataArray = array();

    public function cronjob()
    {
        $chatworkAccounts = ToolChatworkConfigs::all();
        foreach ($chatworkAccounts as $chatworkAccount) {
            $datas = json_decode($chatworkAccount->room_id_array, true);
            if($datas){
                foreach ($datas as $data) {
                    $this->dataArray[] = [
                        'room_id' => $data['room_id'],
                        'lang' => $data['lang'],
                        'account_id' => $chatworkAccount->account_id,
                        'token' => $chatworkAccount->token,
                    ];                    
                }                
            }
        }        

        $room_array_test = [
            155939253,
            159333828,
        ];

        $client = new Client();
        $method = "GET";        
        $promises = [];
        foreach ($this->dataArray as $data) {
            $url = 'https://api.chatwork.com/v2/rooms/';
            if (!in_array($data['room_id'], $room_array_test)){
            	$promises[] = $client->requestAsync('GET', $url.$data['room_id'], [
	                'headers' =>[
	                    'X-ChatWorkToken' => $data['token']
	                ],
	                'http_errors' => false
	            ]);
            }
        }

        $debug = array();
        try {
	        $debug = \GuzzleHttp\Promise\all($promises)->then(function (array $responses) {
	            $debug = $this->checkRoom($responses);
	            return $debug;
	        })->wait();            
        } catch (Exception $e) {
		    $debug[] = "Exception catched\n";
		} finally {
		    return response()->json([
	            'debug' => $debug,
	            'code' => '200',
	            'state' => 'ok'
	        ]);
		}
    }

    private function checkRoom($responses) {
        $debug = array();
        $roomArray = array();
        foreach ($responses as $response) {
            if(isset($response)){
                $contents = $response->getBody()->getContents();         
                $jsContents = json_decode($contents);
                if(!isset($jsContents->errors)){
                    if(!isset($roomArray[$jsContents->room_id])){
                        $roomArray[$jsContents->room_id] = $jsContents;
                    }                    
                }                   
            }
        }

        foreach ($roomArray as $key_room => $result) {
            $whereData = [
                'room_id' => $key_room,
            ];
            $toolChatworkRoom = ToolChatworkRooms::where($whereData)->first();
            if($toolChatworkRoom){            	
                if($toolChatworkRoom->last_update_time != $result->last_update_time){              
                    $toolChatworkRoom->last_update_time = $result->last_update_time;   
                    $toolChatworkRoom->save();                    
                    $debug = array_merge($this->checkMessage($toolChatworkRoom), $debug);
                }
            }else{
            	foreach ($this->dataArray as $data) {
            		if($data['room_id'] == $result->room_id){
            			$token = $data['token'];
            		}
            	}
                $matchThese = array(
                    'room_id' => $result->room_id,
                    'name'=> $result->name,
                    'token' => $token,
                    'last_update_time' => $result->last_update_time,
                );
                $toolChatworkRoom = ToolChatworkRooms::create($matchThese);
                $debug = array_merge($this->checkMessage($toolChatworkRoom), $debug);
            }
        }
        return $debug;
    }

    private function checkMessage($toolChatworkRoom){
        $debug = array();
        $room_id = $toolChatworkRoom->room_id;
        $room_token = $toolChatworkRoom->token;
        $room_created_at = $toolChatworkRoom->created_at->timestamp;

        $messages = (new ChatWorkCoreController)->get_full_room_info($room_token, $room_id);
        
        if($messages != null){
            if(!isset($messages->errors)){
                foreach ($messages as $message) {
                    $message_id = $message->message_id;
                    $account_id = $message->account->account_id;
                    $body = $message->body;
                    $update_time = $message->update_time;    	
                    $send_time = $message->send_time;

                    if($send_time <= $room_created_at){
                        continue;
                    }

                	$token = null;
                    $lang = null;
                    foreach ($this->dataArray as $data) {
                        if($data['account_id'] == $account_id && $data['room_id'] == $room_id){
                            $token = $data['token'];
                            $lang = $data['lang'];
                            break;
                        }
                    }                    
                    if(isset($token) && isset($lang) && $body != '[deleted]'){
                            $whereData = [
                            'room_id' => $room_id,
                            'message_id' => $message_id,
                            'account_id' => $account_id,
                        ];
                        $toolChatworkMessages = ToolChatworkMessages::where($whereData)->first();
                        if(!$toolChatworkMessages){                        	
                            $result = $this->up_message($token, $room_id, $message_id, $body ,$lang);
                            if($result){
                                $debug[] = "account_id : ".$account_id ."\nroom_id : ".$room_id ."\nmessage_id : ". $message_id ."\nbody : \n[code]". str_replace("[hr]","\n------------------------\n",$result->body) ."[/code]";
                                $data = [
                                    'room_id' => $room_id,
                                    'message_id' => $result->message_id,
                                    'account_id' => $result->account->account_id,
                                    'body' => $result->body,
                                    'send_time' => $result->send_time,
                                    'update_time' =>  $result->update_time,
                                ];
                                ToolChatworkMessages::create($data);
                                $toolChatworkRoom->last_update_time = $result->update_time;
                                $toolChatworkRoom->save();
                            }   
                        }else{
                            if($update_time != $toolChatworkMessages->update_time){
                                $result = $this->up_message($token, $room_id, $message_id, $body ,$lang);
                                if($result){
                                	$debug[] = "account_id : ".$account_id ."\nroom_id : ".$room_id ."\nmessage_id : ". $message_id ."\nbody : \n[code]". str_replace("[hr]","\n------------------------\n",$result->body) ."[/code]";
                                    $toolChatworkMessages->body = $result->body;
                                    $toolChatworkMessages->send_time = $result->send_time;
                                    $toolChatworkMessages->update_time = $result->update_time;
                                    $toolChatworkMessages->save();
                                    $toolChatworkRoom->last_update_time = $result->update_time;
                                    $toolChatworkRoom->save();
                                }                           
                            }
                            // code fix version
                            if (strpos($body, '[hr lang=trans]') !== false){
                                $body = str_replace('[hr lang=trans]', "[hr]", $body);

                                $response = (new ChatWorkCoreController)->update_message($token, $room_id, $message_id, $body);
                                if(isset($response->message_id)){
                                    $result = (new ChatWorkCoreController)->get_message_info($token, $room_id, $response->message_id);
                                    $toolChatworkMessages->body = $result->body;
                                    $toolChatworkMessages->send_time = $result->send_time;
                                    $toolChatworkMessages->update_time = $result->update_time;
                                    $toolChatworkMessages->save();
                                    $toolChatworkRoom->last_update_time = $result->update_time;
                                    $toolChatworkRoom->save();
                                }
                            }
                            // code fix version
                        }
                    }
                }
            }
        }
        return $debug;
    }

    private function up_message($token, $room_id, $message_id, $body ,$lang){
        // if (strpos($body, '[hr]') !== false && strpos($body, '[qt]') === false){
        //     $body = explode("[hr]", $body)[0];
        // }

        $arrayLang = explode("-", $lang);
        $numlang = count($arrayLang);
        if (strpos($body, '[hr]') !== false || strpos($body, '[hr lang=trans]') !== false){
        	$arrayBody = explode("[hr]", $body);
            foreach ($arrayLang as $key => $value) {
                if($key>0){
                    if(strpos(end($arrayBody), '[/qt]') === false && strpos(end($arrayBody), '[qt]') === false){
                        array_pop($arrayBody);
                    }
                }                
            }  	       	
            $body = implode("[hr]",$arrayBody);
        }


        // if( $room_id == "167699588"){
        // 	echo $body;
        // }
        // if($message_id == "1271350593604026368"){	    	
        	
        // }

        $body = $this->translateMessage($body,$lang);    	

        if($body){
            $response = (new ChatWorkCoreController)->update_message($token, $room_id, $message_id, $body);
            if(isset($response->message_id)){
                return (new ChatWorkCoreController)->get_message_info($token, $room_id, $response->message_id);
            }
        }else{
            return (new ChatWorkCoreController)->get_message_info($token, $room_id, $message_id);
        }
        return null;
    }

    private function translateMessage($body,$lang)
    {       
        //$re = "/(\[qt\]((.|\n)+?)\[\/qt\])|(\[code\]((.|\n)+?)\[\/code\])|(\[info\]((.|\n)+?)\[\/info\])|(\[rp((.)+?)\n)|(\[To:((.)+?)\n)|(\((((.+)[^-\s])+?)\))/";
        $re = "/(\[qt\]((.|\n)+?)\[\/qt\])|(\[code\]((.|\n)+?)\[\/code\])|(\[info\]((.|\n)+?)\[\/info\])|(\[rp((.)+?)\n)|(\[To:((.)+?)\n)/";
        $chars = preg_split($re, $body, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE); 

        if( !is_array($chars) ){
        	return  null;
        }

        $lastChar = array();
        foreach ($chars as $key => $value) {
            if ($key == 0) {
                $lastChar[] = $value;
            }else{
                if (strpos($chars[$key - 1], $chars[$key]) === false) {
                    if(trim($value) != "") $lastChar[] = $value;
                }
            }
        }
        
        $result = '';        
        $arrayLang = explode("-", $lang);
        foreach ($arrayLang as $key => $tlang) {
            if($key == 0)  {
                $olang = $tlang;
            }
            else{
                $translateValue = '';
                foreach ($lastChar as $key => $value) {
                    if (substr($value, 0, 6) == "[info]" && substr($value, -7) == "[/info]") {
                        //$translateValue .= $value;
                    }
                    elseif (substr($value, 0, 4) == "[qt]" && substr($value, -5) == "[/qt]") {
                        //$translateValue .= $value;
                    }
                    elseif (substr($value, 0, 6) == "[code]" && substr($value, -7) == "[/code]") {
                        $translateValue .= $value;
                    }
                    elseif (substr(trim($value), 0, 4) == "[To:") {
                        //$translateValue .= $value;
                    }
                    elseif (substr(trim($value), 0, 3) == "[rp") {
                        //$translateValue .= $value;
                    }
                    elseif (substr($value, 0, 1) == '(' && substr($value, -1) == ')') {
                        $translateValue .= $value;
                    }
                    else {
                        if (substr($value, 0, 1) == "\n") {
                            $translateValue .= substr($value, 0, 1);
                            $value = substr($value, 1);
                        }
                        try {
                            if(trim($value) != ""){
                                $translated_text = (new TranslationCoreController)->translate_system($olang,$tlang,$value);
                                if($translated_text){
                                    $translateValue .= $translated_text;                                
                                }                               
                            }
                        } catch (Exception $e) {
                            return  null;
                        }

                        if (substr($value, -1) == "\n") {
                            $translateValue .= substr($value, -1);
                        }
                    }
                }
                if($translateValue != ''){
                    $result .= "\n[hr]".trim($translateValue);
                }                
            }            
        }

        if($result != ''){
            $result = str_replace('???', '(', $result);
            $result = str_replace('???', ')', $result);
            $result = str_replace('(???)', '(bow)', $result);
            return  $body.trim($result);
        }
        return  null;
    }

    public function autobot(Request $request){
    	$currentTimeinSeconds = microtime(true);
    	$chatwork_webhook_signature = $request->chatwork_webhook_signature;
    	$contents = $request->getContent();
    	$jsContents = json_decode($contents);

    	if(strpos($jsContents->webhook_event->body, '[hr]') !== false){
		    $body = '';
		    try {
	            $response = $this->cronjob();	            
	            if(isset($response)){
	            	$contents = $response->getContent();        
	    	        $jsContents = json_decode($contents);	    	        
	    	        if($jsContents->code == '200'){    		                
	    		        $contents = $jsContents->debug;	    		        
	    		        foreach ($contents as $key => $value) {
	    		            $body .= $value."[hr]";
	    		        }
	    	        }
	            }else{
	            	$body .= 'Errors';
	            }
	        } catch (Exception  $e) {
	            //Storage::append('auto/log.txt',$e->getMessage());
	        } finally {
	            $total_time = microtime(true) - $currentTimeinSeconds;
	            $total_time = round($total_time,0);
			    $body .=  'Time: '.$total_time.'s'; 
			    if($total_time < 5){
			    	sleep(5-$total_time);
			    }
		    	$this->startAuto($body);
		        return $chatwork_webhook_signature;
	        }		    
    	}        
    }

    private function startAuto($body){
    	$token = 'a22ddcb4c17a74f47120f23e01f7d481';
		$room_id = '168907401';
    	$response = (new ChatWorkCoreController)->create_message($token, $room_id, $body."[hr]");
    	if(!$response){
    		sleep(5);
    		$this->startAuto($body);
    	}
    }
}

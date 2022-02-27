@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <a class="btn btn-secondary float-left" href="{{ url('/') }}">BACK</a>
                    <a href="{{ route('chatwork_admin_index') }}" style="font-size: 1.2rem;">CHATWORK ADMIN</a>
                    <br>
                    <br>
                	<select name="room_id" class="form-control form-control-lg" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    	@foreach ($chatworkRooms as $chatworkRoom)
                    		<option @if($room_id == $chatworkRoom->room_id) selected @endif value="{{route('chatwork_admin_detail',['room_id' => $chatworkRoom->room_id])}}">{{ $chatworkRoom->room_id }} : {{ $chatworkRoom->name }}</option>
                    	@endforeach
                    </select>     
                </div>
                <div class="card-body">
                	<table class="table">
                		<tr>
                			<th width="15%">Account Name</th>
                			<th>Body</th>
                            <th width="15%"></th>
                		</tr>
                		@foreach ($datas as $data)  
                		@if(isset($data->token))              		
                		<tr> 
            				<td>{{$data->account->name}}</td>
                			<td>
                				<form id="form-{{$data->message_id}}" action="" method="POST">
                				@csrf                				 
                				<textarea class="d-inline md-textarea form-control" name="body"
                                @if(strpos($data->body, '[hr]') !== false)  @else style="border-color: red" @endif
                                >{{$data->body}}</textarea>
                				<input type="hidden" name="token" value="{{$data->token}}">
                				<input type="hidden" name="room_id" value="{{$room_id}}">
                				<input type="hidden" name="message_id" value="{{$data->message_id}}">                				
                				</form>                                                  				
                			</td>
                            <td>
                                <button class="btn btn-success edit" onclick="edit('form-{{$data->message_id}}')">Edit</button>
                                <button class="btn btn-danger delete" onclick="del('form-{{$data->message_id}}')">Delete</button>
                            </td>
                		</tr> 
                		@endif               		
                		@endforeach
                	</table>                    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    	$("textarea").each(function(textarea) {
		    $(this).height( $(this)[0].scrollHeight );
		});

        function edit(form){
            var form = $("#"+form);
            form.attr('action', "{{route('chatwork_admin_edit_message')}}");
            form.submit();
        }

        function del(form){
            var r = confirm("Do you want to delete this message");
            if (r == true) {
                var form = $("#"+form);
                form.attr('action', "{{route('chatwork_admin_del_message')}}");
                form.submit();
            }
        }
    </script>    
</div>

@endsection
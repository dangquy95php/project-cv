<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\Front\ContactNaxecubeConceptbookRequest;
use App\Mail\ContactNaxecubeConceptbookAdmin;
use App\Mail\ContactNaxecubeConceptbookUser;
use Illuminate\Http\Request;
use App\Models\ContactNaxecubeConceptbook;
use App\Models\Pref;
use Illuminate\Support\Facades\Mail;

class ContactNaxecubeConceptbookController extends Controller
{
    public function index()
    {
        $sectors = ContactNaxecubeConceptbook::$sectors;
        $descriptions = ContactNaxecubeConceptbook::$descriptions;
        $prefs = Pref::all()->pluck('name', 'id');

        return view('front/contact/naxecube-conceptbook/index', compact('sectors', 'descriptions', 'prefs'));
    }

    public function confirm(ContactNaxecubeConceptbookRequest $request)
    {
        $contacts = new ContactNaxecubeConceptbook($request->all());
        $request->session()->put('contacts_naxecube_conceptbook', $contacts);

        return view('front/contact/naxecube-conceptbook/confirm', compact('contacts'));
    }

    public function store(Request $request)
    {
        $contacts = $request->session()->get('contacts_naxecube_conceptbook');
        $request->session()->forget('contacts_naxecube_conceptbook');

        // 確認画面で「入力した内容を変更する」ボタンが押された時
        if ($request->has('back')) {
            return redirect()->action('Front\ContactNaxecubeConceptbookController@index')->withInput($contacts->getAttributes());
        }

        try {
            // TODO: DB登録処理

            Mail::send(new ContactNaxecubeConceptbookUser($contacts));
            Mail::send(new ContactNaxecubeConceptbookAdmin($contacts));
        } catch (\Exception $e) {
            return redirect('/contact/naxecube-conceptbook/transmission_error');
        }

        // メールの二重送信対策
        $request->session()->regenerateToken();

        return view('front/contact/naxecube-conceptbook/complete');
    }
}

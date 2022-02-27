<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Front\ContactToughGuardCatalogRequest;
use App\Models\ContactToughGuardCatalog;
use App\Mail\ContactToughGuardCatalogAdmin;

class ContactToughGuardCatalogController extends Controller
{
    public function index()
    {
        return view('front/contact/tough-guard-catalog/index');
    }

    public function confirm(ContactToughGuardCatalogRequest $request)
    {
        $contacts = new ContactToughGuardCatalog($request->all());
        $request->session()->put('contacts_tough_guard', $contacts);

        return view('front/contact/tough-guard-catalog/confirm', compact('contacts'));
    }

    public function store(Request $request)
    {
        $contacts = $request->session()->get('contacts_tough_guard');
        $request->session()->forget('contacts_tough_guard');

        // 確認画面で「内容を変更する」ボタンが押された時
        if ($request->has('back')) {
            return redirect()->action('Front\ContactToughGuardCatalogController@index')->withInput($contacts->getAttributes());
        }

        try {
            // TODO: DB登録処理

            Mail::send(new ContactToughGuardCatalogAdmin($contacts));
        } catch (\Exception $e) {
            return redirect('/contact/tough-guard-catalog/transmission_error');
        }

        // メールの二重送信対策
        $request->session()->regenerateToken();

        return view('front/contact/tough-guard-catalog/complete');
    }
}

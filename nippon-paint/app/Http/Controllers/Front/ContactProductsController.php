<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\Front\ContactProductsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactProducts;
use App\Models\Pref;
use App\Mail\ContactProductsAdmin;
use App\Mail\ContactProductsUser;

class ContactProductsController extends Controller
{
    public function index()
    {
        $sectors = ContactProducts::$sectors;
        $inquiries = ContactProducts::$inquiries;
        $prefs = Pref::all()->pluck('name', 'id');

        return view('front/contact/products/index', compact('sectors', 'prefs', 'inquiries'));
    }

    public function confirm(ContactProductsRequest $request)
    {
        $contacts = new ContactProducts($request->all());
        $request->session()->put('contacts_product', $contacts);

        return view('front/contact/products/confirm', compact('contacts'));
    }

    public function store(Request $request)
    {
        $contacts = $request->session()->get('contacts_product');
        $request->session()->forget('contacts_product');

        // 確認画面で「内容を変更する」ボタンが押された時
        if ($request->has('back')) {
            return redirect()->action('Front\ContactProductsController@index')->withInput($contacts->getAttributes());
        }

        try {
            // TODO: DB登録処理

            Mail::send(new ContactProductsUser($contacts));
            Mail::send(new ContactProductsAdmin($contacts));
        } catch (\Exception $e) {
            return redirect('/contact/products/transmission_error');
        }

        // メールの二重送信対策
        $request->session()->regenerateToken();

        return view('front/contact/products/complete');
    }
}

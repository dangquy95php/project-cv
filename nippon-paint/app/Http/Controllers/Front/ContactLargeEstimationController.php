<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\Front\ContactLargeEstimationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactLargeEstimation;
use App\Models\Pref;
use App\Mail\ContactLargeEstimationUser;
use App\Mail\ContactLargeEstimationAdmin;

class ContactLargeEstimationController extends Controller
{
    public function index() {
        $sectors = ContactLargeEstimation::$sectors;
        $targets = ContactLargeEstimation::$targets;
        $fireproof_times = ContactLargeEstimation::$fireproof_times;
        $prefs = Pref::all()->pluck('name', 'id');

        return view('front/contact/large-estimation/index', compact('sectors', 'targets', 'fireproof_times', 'prefs'));
    }

    public function confirm(ContactLargeEstimationRequest $request) {
        $contacts = new ContactLargeEstimation($request->all());
        $request->session()->put('contacts_large_estimation', $contacts);

        return view('front/contact/large-estimation/confirm', compact('contacts'));
    }

    public function store(Request $request) {
        $contacts = $request->session()->get('contacts_large_estimation');
        $request->session()->forget('contacts_large_estimation');

        // 確認画面で「内容を修正する」ボタンが押された時
        if ($request->has('back')) {
            return redirect()->action('Front\ContactLargeEstimationController@index')->withInput($contacts->getAttributes());
        }

        try {
            // TODO: DB登録処理

            Mail::send(new ContactLargeEstimationUser($contacts));
            Mail::send(new ContactLargeEstimationAdmin($contacts));
        } catch (\Exception $e) {
            return redirect('/contact/large-estimation/transmission_error');
        }

        // メールの二重送信対策
        $request->session()->regenerateToken();

        return view('front/contact/large-estimation/complete');
    }
}

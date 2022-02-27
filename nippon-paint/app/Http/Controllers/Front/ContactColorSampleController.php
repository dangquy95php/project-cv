<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Front\ContactColorSampleRequest;
use App\Mail\ContactColorSampleAdmin;
use App\Mail\ContactColorSampleUser;
use App\Models\Contacts;
use App\Models\ContactColorSample;
use App\Models\Pref;

class ContactColorSampleController extends Controller
{
    public function index()
    {
        $sectors = ContactColorSample::$sectors;
        $pro_journals = ContactColorSample::$pro_journals;
        $homepages = ContactColorSample::$homepages;
        $others = ContactColorSample::$others;
        $constructions = ContactColorSample::$constructions;
        $prefs = Pref::all()->pluck('name', 'id');

        return view('front/contact/color-sample/index'
            , compact('sectors', 'pro_journals', 'homepages', 'others', 'constructions', 'prefs'));
    }

    public function confirm(ContactColorSampleRequest $request)
    {
        $contacts = new ContactColorSample($request->all());
        $request->session()->put('contacts_color_sample', $contacts);

        return view('front/contact/color-sample/confirm', compact('contacts'));
    }

    public function store(Request $request)
    {
        $contacts = $request->session()->get('contacts_color_sample');
        $request->session()->forget('contacts_color_sample');

        // 確認画面で「内容を修正する」ボタンが押された時
        if ($request->has('back')) {
            return redirect()->action('Front\ContactColorSampleController@index')->withInput($contacts->getAttributes());
        }

        try {
            $contact = new Contacts;
            $form_id = $contact->findFormId();
            $contact_json = $contact->convertContactToJson($contacts);
            $contact->fill(['form_id' => $form_id, 'contact' => $contact_json])->save();

            Mail::send(new ContactColorSampleUser($contacts));
            Mail::send(new ContactColorSampleAdmin($contacts));
        } catch (\Exception $e) {
            return redirect('/contact/color-sample/transmission_error');
        }

        // メールの二重送信対策
        $request->session()->regenerateToken();

        return view('front/contact/color-sample/complete');
    }

    public function download(Request $request)
    {
        $period = $request->input('period') ?? '';
        if (empty($period) || !in_array($period, ['today', 'this_month', 'prev_month'], true)) {
            return view('front/contact/color-sample/download/index');
        }

        $contact = new Contacts();
        if ($period === 'today') {
            $today = Carbon::now()->format('Y-m-d');
            $contacts = Contacts::query()->whereDate('created_at', $today)->get()->toArray();
        } elseif ($period === 'this_month') {
            $first_date = date('Y-m-d H:i:s', strtotime('first day of this month 00:00:00'));
            $last_date = date('Y-m-d H:i:s', strtotime('last day of this month 23:59:59'));
            $contacts = Contacts::query()->whereBetween('created_at', [$first_date, $last_date])->get()->toArray();
        } elseif ($period === 'prev_month') {
            $first_date = date('Y-m-d H:i:s', strtotime('first day of previous month 00:00:00'));
            $last_date = date('Y-m-d H:i:s', strtotime('last day of previous month 23:59:59'));
            $contacts = Contacts::query()->whereBetween('created_at', [$first_date, $last_date])->get()->toArray();
        }
        return $contact->createCsvFile($contacts);
    }
}

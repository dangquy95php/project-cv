@extends('layouts/template')

@section('title','タイトル')
@section('description','ディスクリプション')
@section('keywords','キーワード')
@include('layouts/head')

@section('pageid','index')

@section('project','index')
@section('content')

    <div class="c-slide1">
        <div class="c-slide1__slider">
            <div class="c-slide1__cont">
                <img src="/img/index/mv1.jpg" alt="">
            </div>
        </div>
    </div>
    <x-section>
        <x-slot name="sec_class">
            l-sec1--exBoth
        </x-slot>

        <x-slot name="sec_cont">
            <div class="c-set_ttl1">
                <x-ttl1>
                    <x-slot name="ttl1_class">
                    </x-slot>
                    <x-slot name="ttl1_txt">
                        塗料を探す
                    </x-slot>
                </x-ttl1>
                <p class="c-set_ttl1__txt">日本ペイントは住宅やビル、マンションなどの建築物・橋梁・プラント・タンクなどの大型構造物用塗料や、自動車の補修塗装向け塗料の開発・製造および販売を展開しています。</p>
                <x-btn1>
                    <x-slot name="btn1_location">#</x-slot>
                    <x-slot name="btn1_txt">製品一覧を見る</x-slot>
                </x-btn1>
            </div>
            <div class="l-sec1__row">
                <div class="c-set_card1">
                    <div class="c-card1">
                        <img src="/img/common/sample.jpg" alt="" class="c-card1__img">
                        <h4 class="c-card1__ttl">建築用塗料</h4>
                    </div>
                    <div class="c-card1">
                        <img src="/img/common/sample.jpg" alt="" class="c-card1__img">
                        <h4 class="c-card1__ttl">建築用塗料</h4>
                    </div>
                    <div class="c-card1">
                        <img src="/img/common/sample.jpg" alt="" class="c-card1__img">
                        <h4 class="c-card1__ttl">建築用塗料</h4>
                    </div>
                </div>
            </div>

        </x-slot>

    </x-section>

    <x-section>
        <x-slot name="sec_class">
            l-sec1--exRight l-sec1--bg1
        </x-slot>

        <x-slot name="sec_cont">
            <div class="c-set_ttl1">
                <x-ttl1>
                    <x-slot name="ttl1_class">
                        c-ttl1--white
                    </x-slot>
                    <x-slot name="ttl1_txt">
                        塗料を探す
                    </x-slot>
                </x-ttl1>
                <p class="c-set_ttl1__txt">日本ペイントは住宅やビル、マンションなどの建築物・橋梁・プラント・タンクなどの大型構造物用塗料や、自動車の補修塗装向け塗料の開発・製造および販売を展開しています。</p>
                <x-btn1>
                    <x-slot name="btn1_location">#</x-slot>
                    <x-slot name="btn1_txt">製品一覧を見る</x-slot>
                </x-btn1>
            </div>

            <div class="l-sec1__row">
                <div class="c-set_card1">
                    <div class="c-card1">
                        <img src="/img/common/sample.jpg" alt="" class="c-card1__img">
                        <h4 class="c-card1__ttl">建築用塗料</h4>
                    </div>
                    <div class="c-card1">
                        <img src="/img/common/sample.jpg" alt="" class="c-card1__img">
                        <h4 class="c-card1__ttl">建築用塗料</h4>
                    </div>
                    <div class="c-card1">
                        <img src="/img/common/sample.jpg" alt="" class="c-card1__img">
                        <h4 class="c-card1__ttl">建築用塗料</h4>
                    </div>
                </div>
            </div>
        </x-slot>

    </x-section>

    <x-section>
        <x-slot name="sec_class">
            l-sec1--exLeft
        </x-slot>

        <x-slot name="sec_cont">
            <div class="c-set_ttl1">
                <x-ttl1>
                    <x-slot name="ttl1_class">
                    </x-slot>
                    <x-slot name="ttl1_txt">
                        塗料を探す
                    </x-slot>
                </x-ttl1>
                <p class="c-set_ttl1__txt">日本ペイントは住宅やビル、マンションなどの建築物・橋梁・プラント・タンクなどの大型構造物用塗料や、自動車の補修塗装向け塗料の開発・製造および販売を展開しています。</p>
                <x-btn1>
                    <x-slot name="btn1_location">#</x-slot>
                    <x-slot name="btn1_txt">製品一覧を見る</x-slot>
                </x-btn1>
            </div>
            <div class="l-sec1__row">
                <div class="c-set_card1">
                    <div class="c-card1">
                        <img src="/img/common/sample.jpg" alt="" class="c-card1__img">
                        <h4 class="c-card1__ttl">建築用塗料</h4>
                    </div>
                    <div class="c-card1">
                        <img src="/img/common/sample.jpg" alt="" class="c-card1__img">
                        <h4 class="c-card1__ttl">建築用塗料</h4>
                    </div>
                    <div class="c-card1">
                        <img src="/img/common/sample.jpg" alt="" class="c-card1__img">
                        <h4 class="c-card1__ttl">建築用塗料</h4>
                    </div>
                </div>
            </div>

        </x-slot>

    </x-section>

    @endsection

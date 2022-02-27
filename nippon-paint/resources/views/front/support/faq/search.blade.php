<x-header>
    <x-slot name="title">{{$title}}</x-slot>
    <x-slot name="description">「{検索KW}」の検索結果一覧です。建築用塗料、大型構造物・重防食用塗料、自動車補修用塗料について、みなさまからよくお寄せいただくご質問をご紹介します。</x-slot>
    <x-slot name="slug">p-</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="unique">support_faq</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/support/faq/{{$title}}</x-slot>
</x-header>

<main class="p-">

    <section class="p-">
        @include('front.elements.support.faq.search', [
            'keywords' => $request->get('keywords') ? implode(' ', $request->get('keywords')) : '',
        ])
    </section>
    @if (!empty($faqs))
        <section class="p-">
            <h1>{{$title}}</h1>
            <p>{{$faqs->count()}}件</p>
            <table>
                @foreach ($faqs as $faq)
                    <tr>
                        <td><a href="{{ url("/support/faq/{$faq->id}")}}">{{$faq->question}}</a></td>
                    </tr>
                @endforeach
            </table>
        </section>
    @endif
    <section class="p-">
        @include('front.elements.support.faq.category')
    </section>
</main>
<x-footer></x-footer>



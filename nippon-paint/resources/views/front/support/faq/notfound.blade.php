<x-header>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="description">description</x-slot>
    <x-slot name="slug"></x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="unique">support_faq</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url"></x-slot>
</x-header>

<main class="p-">

    <section class="p-">
        @include('front.elements.support.faq.search', [
            'keywords' => $_redirect['keywords'] ? implode(' ', $_redirect['keywords']) : '',
        ])
    </section>
    <section class="p-">
    <h1>{{$title}}</h1>
        <p>{{$result}}</p>
    </section>

</main>
<x-footer></x-footer>



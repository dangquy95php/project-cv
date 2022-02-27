<ul class="c-list7">
    @foreach($faq_pickups as $faq)
    <li class="c-list7__item">
        <a href="{{ url('/support/faq/'.$faq->id) }}" class="c-list7__txt">{{ $faq->question }}</a>
    </li>
    @endforeach
</ul>
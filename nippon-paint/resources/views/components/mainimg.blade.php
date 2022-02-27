<section class="c-mainimg {{$mainimg_class ?? ''}}">
    <div class="l-cont">
        <h1 class="c-mainimg__title">
            <span class="c-mainimg__title__jap">{{$title_jap}}</span>
            <span class="c-mainimg__title__eng">{{$title_eng}}</span>
        </h1>
        @if(isset($text))
        <p class="c-mainimg__text">{{$text}}</p>
        @endif
    </div>
</section><!-- / c-mainimg -->
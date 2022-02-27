<div class="c-list14">
    <p class="c-list14__heading">
        <span class="c-list14__main">タグで<br class="pc-only">絞り込む</span>
        <span class="c-list14__sub">Tag</span>
    </p>
    @if($term_tags)
        <ul class="c-list14__box">
            @foreach($term_tags as $tag)
                <li class="c-list14__item">
                    <a href="{{ url("nippelab/term/tag/{$tag['slug']}") }}" class="c-list14__txt c-list14__txt--red c-list14__txt c-list14__txt--red--red">{{ $tag['name'] }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</div><!-- / c-list14 -->
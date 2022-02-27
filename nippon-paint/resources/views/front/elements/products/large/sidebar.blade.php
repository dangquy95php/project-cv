<div class="l-sidebar">
    <aside class="c-side">
        <div class="c-side__box">
            <h4 class="c-side__title">塗料系統で探す</h4>
            <ul class="c-side__list">
                @foreach ($systems->splice(0, 5) as $system)
                    <li class="c-side__item">
                        <a href="{{ url("/products/large/paint/system/$system->slug") }}">{{ $system->name }}</a>
                    </li>
                @endforeach
            </ul>
            @if (!$systems->isEmpty())
                <div class="c-side__more">
                    <ul class="c-side__list">
                        @foreach ($systems as $system)
                            <li class="c-side__item">
                                <a href="{{ url("/products/large/paint/system/" . $system->slug) }}">{{ $system->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="c-side__btn">
                        <span>もっと見る</span>
                    </div>
                </div>
            @endif
        </div>
        <div class="c-side__box">
            <h4 class="c-side__title">製品規格から探す</h4>
            <ul class="c-side__list">
                @foreach ($standards->splice(0, 5) as $standard)
                    <li class="c-side__item">
                        <a href="{{ url("/products/large/paint/standard/$standard->slug") }}">[{{ $standard->p_large_standard_category->name }}] {{ $standard->standard_name }}</a>
                    </li>
                @endforeach
            </ul>
            @if (!$standards->isEmpty())
                <div class="c-side__more">
                    <ul class="c-side__list">
                        @foreach ($standards as $standard)
                            <li class="c-side__item">
                                <a href="{{ url("/products/large/paint/standard/$standard->slug") }}">[{{ $standard->p_large_standard_category->name }}] {{ $standard->standard_name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="c-side__btn">
                        <span>もっと見る</span>
                    </div>
                </div>
            @endif
        </div>

        <div class="c-banner">
            <a href="{{ url("/products/large/fireproof") }}" class="c-banner__text"><span>耐火塗料の優れた特長</span></a>
        </div>
    </aside>
</div>

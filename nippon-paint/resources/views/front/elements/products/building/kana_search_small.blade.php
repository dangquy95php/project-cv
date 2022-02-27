<div class="c-initials c-initials--style4 is-active">
    <div class="c-initials__btn sp-only js-c-initials__btn is-active"></div>
    <h3 class="c-initials__title">
        <span class="c-initials__title__jap">資料を50音で探す</span>
        <span class="c-initials__title__eng">Initials</span>
    </h3>
    <div class="c-initials__inner">
        <ul class="c-initials__block1">
            @foreach($p_building_search::$kana as $key => $kana)
                <li class="c-initials__item {{ $p_building_search->countKana($key) > 0 ? '' : 'is-disable' }}{{ $p_building_search->initial === $key ? ' is-active' : '' }}"><a href="{{ url('products/building/catalog/initial/'.$key) }}">{{ $kana }}</a></li>
            @endforeach
        </ul>
    </div>

</div>

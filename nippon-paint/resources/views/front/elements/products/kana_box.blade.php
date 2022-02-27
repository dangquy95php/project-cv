<div class="c-initials c-initials--style4 is-active">
    <div class="c-initials__btn sp-only js-c-initials__btn is-active"></div>
    <h3 class="c-initials__title">
        <span class="c-initials__title__jap">製品を50音で探す</span>
        <span class="c-initials__title__eng">Initials</span>
    </h3>
    <div class="c-initials__inner">
        <ul class="c-initials__block1">
            <li class="c-initials__item {{ ($kana_count['ア'] > 0) ? '' : 'is-disable' }}"><a href="{{ $href_base_url }}ア">ア</a></li>
            <li class="c-initials__item {{ ($kana_count['カ'] > 0) ? '' : 'is-disable' }}"><a href="{{ $href_base_url }}カ">カ</a></li>
            <li class="c-initials__item {{ ($kana_count['サ'] > 0) ? '' : 'is-disable' }}"><a href="{{ $href_base_url }}サ">サ</a></li>
            <li class="c-initials__item {{ ($kana_count['タ'] > 0) ? '' : 'is-disable' }}"><a href="{{ $href_base_url }}タ">タ</a></li>
            <li class="c-initials__item {{ ($kana_count['ナ'] > 0) ? '' : 'is-disable' }}"><a href="{{ $href_base_url }}ナ">ナ</a></li>
            <li class="c-initials__item {{ ($kana_count['ハ'] > 0) ? '' : 'is-disable' }}"><a href="{{ $href_base_url }}ハ">ハ</a></li>
            <li class="c-initials__item {{ ($kana_count['マ'] > 0) ? '' : 'is-disable' }}"><a href="{{ $href_base_url }}マ">マ</a></li>
            <li class="c-initials__item {{ ($kana_count['ヤ'] > 0) ? '' : 'is-disable' }}"><a href="{{ $href_base_url }}ヤ">ヤ</a></li>
            <li class="c-initials__item {{ ($kana_count['ラ'] > 0) ? '' : 'is-disable' }}"><a href="{{ $href_base_url }}ラ">ラ</a></li>
            <li class="c-initials__item {{ ($kana_count['ワ'] > 0) ? '' : 'is-disable' }}"><a href="{{ $href_base_url }}ワ">ワ</a></li>

            <li class="c-initials__item last  {{ ($kana_count['0-9'] > 0) ? '' : 'is-disable' }}"><a href="{{ $href_base_url }}0-9">0-9</a></li>
        </ul>
    </div>

</div><!-- / c-initials c-initials--style4 -->

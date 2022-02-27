<div class="c-initials c-initials--style2 c-initials--style2--red is-active">
    <div class="c-initials__btn sp-only js-c-initials__btn is-active"></div>
    <h3 class="c-initials__title">
        <span class="c-initials__title__jap">50音順で<br class="pc-only">絞り込む</span>
        <span class="c-initials__title__eng">Initials</span>
    </h3>
    <div class="c-initials__inner">

        <ul class="c-initials__block1">
            @foreach ($kana_lines as $i => $kana)
                @if (!is_numeric($i))
                    <li class="c-initials__item">
                        <a href="{{ url("nippelab/term/initial/{$kana_line_alphabets[$i]}") }}">{{ $kana }}</a>
                    </li>
                @endif
            @endforeach
        </ul>

        <ul class="c-initials__block1">
            @foreach ($kana_lines as $i => $kana)
                @if (is_numeric($i))
                    <li class="c-initials__item">
                        <a href="{{ url("nippelab/term/initial/{$kana_line_alphabets[$i]}") }}">{{ $kana }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>


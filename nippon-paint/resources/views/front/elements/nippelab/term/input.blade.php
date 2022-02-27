<div class="c-block1__form">
    <div class="c-form1 c-form1--style2">
        <h2 class="c-form1__text">
            <span class="c-form1__text1">用語検索</span>
            <span class="c-form1__text2">Search</span>
        </h2><!-- / c-form1__text -->

        {{ Form::open(['route' => 'term.searchKeywords', 'method' => 'get', 'class' => 'c-form1__form']) }}
            <div class="c-form1__input">
                <input type="text" name="keywords" value="{{ $keywords }}" placeholder="キーワードを入力して下さい">
            </div>

            <button class="c-form1__btn"></button>
        {{ Form::close() }}
    </div>
</div>





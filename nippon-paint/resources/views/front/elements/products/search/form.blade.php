<div class="c-form1">
    <h2 class="c-form1__text">
        <span class="c-form1__text1">製品・仕様<br class="pc-only">を探す</span>
        <span class="c-form1__text2">Search</span>
    </h2><!-- / c-form1__text -->
    <form action="{{ route('front.products.search') }}" class="c-form1__form" id="{{ isset($limit_change) && $limit_change ? 'search-form' : '' }}">
        <div class="c-form1__select">
            {{ Form::select('type', \App\Models\ProductSearch::F_FORM_SELECT_OPTIONS, $type_value, []) }}
        </div>

        <div class="c-form1__input">
            <input name="keywords" type="text" placeholder="製品名・仕様名・規格番号で検索" value="{{ $keywords_value }}">
        </div>

        <button class="c-form1__btn"></button>
    </form><!-- / c-form1__form -->

</div>

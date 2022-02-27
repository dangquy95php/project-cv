{{ Form::open(['route' => 'faq.searchKeywords', 'method' => 'get', 'class' => 'c-form1__form']) }}
    <div class="c-form1__input">
        <input type = "text" name="keywords" value="{{ $keywords }}" placeholder="キーワードを入力してください">
    </div>
    <button type="submit" class="c-form1__btn"></button>
{{ Form::close() }}

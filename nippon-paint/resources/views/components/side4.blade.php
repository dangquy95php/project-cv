<aside class="c-side">
    <div class="c-side__box">
        <h4 class="c-side__title">カテゴリーから探す</h4>
        <ul class="c-side__list">
            @foreach($parent_categories as $category)
            <li class="c-side__item"><a href="{{ url('/products/automotive/cat/'.$category->slug) }}">{{ $category->category_name }}</a></li>
            @endforeach
        </ul>
    </div>
</aside>

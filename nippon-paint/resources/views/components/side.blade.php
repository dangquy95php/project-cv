<aside class="c-side">
    <div class="c-side__box">
        <h4 class="c-side__title">塗料系統から探す</h4>
        <ul class="c-side__list">
            @foreach($subcategories as $subcategory)
            <li class="c-side__item"><a href="{{ $subcategory->subcategory_url }}">{{ $subcategory->category_name }}</a></li>
            @endforeach
        </ul>
    </div>
</aside>
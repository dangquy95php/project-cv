<ul class="c-list5">
    @foreach($p_building_search->subcategories as $subcategory)
    <li class="c-list5__item">
        <a href="{{ $subcategory->subcategory_url }}" class="c-list5__inner">
            <figure class="c-list5__img">
                <img src="/images/products/icon{{ $subcategory->id }}.svg" alt="{{ $subcategory->category_name }}">
            </figure>
            <p class="c-list5__ttl">{{ $subcategory->category_name }}</p>
        </a>
    </li>
    @endforeach
</ul>
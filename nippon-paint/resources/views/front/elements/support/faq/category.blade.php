@if (isset($categories))
    @foreach ($categories as $key => $category)
        <h3 class="c-title2 c-title2__style3">{{ $key }}</h3>
        <ul class="c-list6__box c-list6__box--fwidth">
            @foreach($category as $child_category)
                <li class="c-list6__item arrow">
                    <a href="{{ $child_category->category_url }}" class="c-list6__txt">{{ $child_category->category_name }}</a>
                </li>
            @endforeach
        </ul>
    @endforeach
@endif

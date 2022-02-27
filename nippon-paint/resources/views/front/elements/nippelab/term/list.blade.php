<ul class="c-boxlist c-boxlist1  c-boxlist1--style2">
    @foreach($technical_terms as $term)
        <li class="c-boxlist1__item">
            <a href="{{ url('nippelab/term') }}{{ $term->id }}">
                <div class="c-boxlist__head"><span>{{ $term->title }}</span></div>
                @if (mb_strlen(trim(strip_tags($term->contents))) > 24)
                    <p class="c-boxlist__text">
                        {!! mb_substr(trim(strip_tags($term->contents)), 0, 24, 'UTF-8') !!}...
                    </p>
                @else
                    <p class="c-boxlist__text">
                        {!! trim(strip_tags($term->contents)) !!}
                    </p>
                @endif
            </a>
        </li>
    @endforeach
</ul>

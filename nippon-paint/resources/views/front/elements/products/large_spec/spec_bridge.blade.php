<div class="c-block2__body type2">
    <div class="c-block2__top">
        <div class="c-block2__top__content">
            <h3 class="c-block2__top__title">
                @if($spec->spec_number)
                <span class="c-block2__top__titlesub">仕様番号：{{ $spec->spec_number }}</span>
                @endif
                <span class="c-block2__top__text2">仕様名</span>
                <a class="c-block2__top__titletext" href="{{ url('products/large/specification-bridge/'.$spec->id) }}"><span>{{ $spec->name }}</span></a>
            </h3>
            <ul class="c-block2__grlabel">
                <li class="c-block2__grlabel__label">{{ $spec->standard_name }}</li>
                @foreach($spec->p_large_spec_bridge_sections as $section)
                    <li class="c-block2__grlabel__label">{{ $section->section_label }}</li>
                @endforeach
                @foreach($spec->p_large_spec_bridge_coated_matters as $coated_matter)
                    <li class="c-block2__grlabel__label">{{ $coated_matter->name }}</li>
                @endforeach
                @foreach($spec->p_large_spec_bridge_paint_points as $paint_point)
                    <li class="c-block2__grlabel__label">{{ $paint_point->name }}</li>
                @endforeach
            </ul>
        </div>
    </div><!-- / c-block2__top -->
    <div class="c-block2__bottom">
        <ul class="c-block2__bottom__list type2">
            @foreach($spec->published_documents as $document)
            <li class="c-block2__bottom__item">
            <a href="{{ $document->document_url_path }}" target="_blank">{{ $document->document_category }}を見る</a>
            </li>
            @endforeach
            <li class="c-block2__bottom__item notIcon">
                <a href="{{ url('products/large/specification-bridge/'.$spec->id) }}" target="_blank">仕様の詳細を見る</a>
            </li>
        </ul>
    </div><!-- / c-block2__bottom -->
</div>

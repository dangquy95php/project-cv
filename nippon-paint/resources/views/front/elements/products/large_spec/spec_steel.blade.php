<div class="c-block2__body type2">
    <div class="c-block2__top">
        <div class="c-block2__top__content">
            <h3 class="c-block2__top__title">
                @if($spec->spec_number)
                <span class="c-block2__top__titlesub">仕様番号：{{ $spec->spec_number }}</span>
                @endif
                <span class="c-block2__top__text2">仕様名</span>
                <a class="c-block2__top__titletext" href="{{ url('products/large/specification-steele/'.$spec->id) }}"><span>{{ $spec->name }}</span></a>
            </h3>
            <ul class="c-block2__grlabel">
                <li class="c-block2__grlabel__label">{{ $spec->standard_name }}</li>
                @foreach($spec->p_large_spec_steel_sections as $section)
                    <li class="c-block2__grlabel__label">{{ $section->section_label }}</li>
                @endforeach
                @foreach($spec->p_large_spec_steel_systems as $system)
                    <li class="c-block2__grlabel__label">{{ $system->name }}</li>
                @endforeach
                @foreach($spec->p_large_spec_steel_solvent_types as $solvent_type)
                    <li class="c-block2__grlabel__label">{{ $solvent_type->name }}</li>
                @endforeach
                @foreach($spec->p_large_spec_steel_points as $point)
                    <li class="c-block2__grlabel__label">{{ $point->name }}</li>
                @endforeach
                @foreach($spec->p_large_spec_steel_features as $feature)
                    <li class="c-block2__grlabel__label">{{ $feature->name }}</li>
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
                <a href="{{ url('products/large/specification-steele/'.$spec->id) }}" target="_blank">仕様の詳細を見る</a>
            </li>
        </ul>
    </div><!-- / c-block2__bottom -->
</div>

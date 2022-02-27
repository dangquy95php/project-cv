@if($p_building_search->subcategories->count() > 0)
    <div class="c-form2__row is-open">
        <div class="c-form2__label">{!! $category_label !!}</div>
        <div class="c-form2__grcheckbox">
            @foreach($p_building_search->subcategories as $subcategory)
                <span class="c-form2__cb">
                    <label for="checkbox0{{$subcategory->id}}">
                        <input type="checkbox" id="checkbox0{{$subcategory->id}}" name="{{$category_name}}[]" value="{{$subcategory->id}}" {{$subcategory->is_checked}}>
                        <span>{{ $subcategory->category_name }}</span>
                    </label>
                </span>
            @endforeach
            <span class="c-form2__cb sp-only"></span>
        </div><!-- / c-form2__grcheckbox -->

    </div><!-- / c-form2__row -->
@endif

<div class="c-form2__row is-open">
    <div class="c-form2__label">樹脂</div>
    <div class="c-form2__grcheckbox">
        @foreach($p_building_search->resins as $resin)
            <span class="c-form2__cb {{ $resin->is_disable }}">
                <label for="checkbox2{{$resin->id}}">
                    <input type="checkbox" id="checkbox2{{$resin->id}}" name="resin[]" value="{{$resin->id}}" {{ $resin->is_checked }}>
                    <span>{{ $resin->name }}</span>
                </label>
            </span>
        @endforeach
    </div><!-- / c-form2__grcheckbox -->

</div><!-- / c-form2__row -->

<div class="c-form2__row is-open">
    <div class="c-form2__label">水性/溶剤</div>
    <div class="c-form2__grcheckbox">
        @foreach($p_building_search->bases as $base)
            <span class="c-form2__cb {{ $base->is_disable }}">
                <label for="checkbox3{{$base->id}}">
                    <input type="checkbox" id="checkbox3{{$base->id}}" name="base[]" value="{{$base->id}}" {{ $base->is_checked }}>
                    <span>{{ $base->name }}</span>
                </label>
            </span>
        @endforeach
        <span class="c-form2__cb">
                                </span>
    </div><!-- / c-form2__grcheckbox -->

</div><!-- / c-form2__row -->

<div class="c-form2__row is-open">
    <div class="c-form2__label">1液/2液</div>
    <div class="c-form2__grcheckbox">
        @foreach($p_building_search->pack_types as $pack_type)
            <span class="c-form2__cb {{ $pack_type->is_disable }}">
                <label for="checkbox4{{$pack_type->id}}">
                    <input type="checkbox" id="checkbox4{{$pack_type->id}}" name="pack_type[]" value="{{$pack_type->id}}" {{ $pack_type->is_checked }}>
                    <span>{{ $pack_type->name }}</span>
                </label>
            </span>
        @endforeach
        <span class="c-form2__cb">
                                </span>
    </div><!-- / c-form2__grcheckbox -->

</div><!-- / c-form2__row -->

<div class="c-form2__row__extend">
    <div class="c-form2__row is-open">
        <div class="c-form2__label">素材</div>
        <div class="c-form2__grcheckbox">
            @foreach($p_building_search->materials as $material)
                <span class="c-form2__cb {{ $material->is_disable }}">
                    <label for="checkbox5{{$material->id}}">
                        <input type="checkbox" id="checkbox5{{$material->id}}" name="material[]" value="{{$material->id}}" {{ $material->is_checked }}>
                        <span>{{ $material->name }}</span>
                    </label>
                </span>
            @endforeach
            <span class="c-form2__cb"></span>
        </div><!-- / c-form2__grcheckbox -->

    </div><!-- / c-form2__row -->

    <div class="c-form2__row is-open">
        <div class="c-form2__label">JIS</div>
        <div class="c-form2__grcheckbox">
            @foreach($p_building_search->jis_numbers as $jis_number)
                <span class="c-form2__cb {{ $jis_number->is_disable }}">
                    <label for="checkbox6{{$jis_number->id}}">
                        <input type="checkbox" id="checkbox6{{$jis_number->id}}" name="jis_number[]" value="{{$jis_number->id}}" {{ $jis_number->is_checked }}>
                        <span>{{ $jis_number->name }}</span>
                    </label>
                </span>
            @endforeach
        </div><!-- / c-form2__grcheckbox -->

    </div><!-- / c-form2__row -->

    <div class="c-form2__row is-open">
        <div class="c-form2__label">用途</div>
        <div class="c-form2__grcheckbox">
            @foreach($p_building_search->usages as $key => $usage)
                <span class="c-form2__cb {{ $p_building_search->isUseDisable($key) }}">
                    <label for="checkbox7{{$key}}">
                        <input type="checkbox" id="checkbox7{{$key}}" name="usage[]" value="{{ $key }}" {{ $p_building_search->isUseChecked($key) }}>
                        <span>{{ $usage }}</span>
                    </label>
                </span>
            @endforeach
        </div><!-- / c-form2__grcheckbox -->

    </div><!-- / c-form2__row -->

    <div class="c-form2__row is-open">
        <div class="c-form2__label">機能</div>
        <div class="c-form2__grcheckbox">
            @foreach($p_building_search->purposes as $purpose)
                <span class="c-form2__cb {{ $purpose->is_disable }}">
                    <label for="checkbox8{{$purpose->id}}">
                        <input type="checkbox" id="checkbox8{{$purpose->id}}" name="purpose[]" value="{{$purpose->id}}" {{ $purpose->is_checked }}>
                        <span>{{ $purpose->name }}</span>
                    </label>
                </span>
            @endforeach
        </div><!-- / c-form2__grcheckbox -->

    </div><!-- / c-form2__row -->

</div><!-- / c-form2__row__extend -->

<div class="c-form2__rowadd js-c-form2__rowadd">
    <p class="c-form2__rowadd__text js-open-form2-row pc-only">詳細条件を開く</p>
    <p class="c-form2__rowadd__text js-open-form2-row sp-only is-open">詳細条件を開く</p>
    <div class="c-form2__rowadd__after"></div>
</div><!-- / c-form2__rowadd -->
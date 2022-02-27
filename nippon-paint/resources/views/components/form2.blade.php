<div class="c-form2">
    <div class="l-cont">
        <div class="c-form2__header">
            <h3 class="c-form2__title1">
                <span class="c-form2__title1__jap">塗装系統で絞り込む</span>
                <span class="c-form2__title1__eng">Filter</span>
            </h3>

            <h4 class="c-form2__title2">該当件数<span id="count-building-catalog">{{ $p_building_search->getCount() }}</span>件</h4>
        </div><!-- / c-form2__header -->

        <div class="c-form2__text sp-only">
            <div class="c-form2__text__inner">
                @foreach($p_building_search->conditions as $condition)
                    <div class="c-form2__text__row">
                        <p class="c-form2__text1"><strong>{{ $condition['label'] }}</strong>／</p>
                        <p class="c-form2__text2">{{ $condition['condition'] }}</p>
                    </div>
                @endforeach
            </div><!-- / c-form2__text__inner -->

        </div><!-- / c-form2__text -->

        <div class="c-form2__body">
            <form action="/products/building/catalog/cat" class="c-form2__form" data-name="building-catalog">
                <div class="c-form2__form__inner">
                    <div class="c-form2__row">
                        <div class="c-form2__label">系統</div>
                        <div class="c-form2__grcheckbox">
                            @foreach($p_building_search->subcategories as $subcategory)
                                <span class="c-form2__cb {{ $subcategory->is_disable }}">
                                    <label for="checkbox0{{$subcategory->id}}">
                                        <input type="checkbox" id="checkbox0{{$subcategory->id}}" name="q[]" value="{{$subcategory->id}}" {{$subcategory->is_checked}}>
                                        <span>{{ $subcategory->category_name }}</span>
                                    </label>
                                </span>
                            @endforeach
                        </div><!-- / c-form2__grcheckbox -->

                    </div><!-- / c-form2__row -->

                </div>
                <div class="c-form2__btn">
                    <button type="submit">絞り込む</button>
                </div>
            </form>
        </div><!-- / c-form2__body -->

    </div>
</div><!-- / c-form2 -->
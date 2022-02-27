<div class="c-form2">
    <div class="l-cont">
        <div class="c-form2__header">
            <h3 class="c-form2__title1">
                <span class="c-form2__title1__jap">条件で絞り込む</span>
                <span class="c-form2__title1__eng">Filter</span>
            </h3>

            <div class="c-form2__title2">該当件数<div class="c-form2__title2__number"><div id="count-automotive" class="count-number">{{ $p_automotive_search->totalCount() }}</div><div class="odometer"></div></div>件</div>
        </div><!-- / c-form2__header -->

        <div class="c-form2__text sp-only">
            <div class="c-form2__text__inner">
                @foreach($p_automotive_search->conditions as $condition)
                <div class="c-form2__text__row">
                    <p class="c-form2__text1"><strong>{{ $condition['label'] }}</strong>／</p>
                    <p class="c-form2__text2">{{ $condition['condition'] }}</p>
                </div>
                @endforeach
            </div><!-- / c-form2__text__inner -->

        </div><!-- / c-form2__text -->

        <div class="c-form2__body">
            <form action="{{ $p_automotive_search->parent_category ? '' : url('products/automotive/search/') }}" class="c-form2__form" id="search-form" data-name="automotive" data-parent="{{ $p_automotive_search->parent_category ? $p_automotive_search->parent_category->slug : '' }}">
                <div class="c-form2__form__inner">
                    <div class="c-form2__btnclose js-c-form2__btnclose is-open"><span class="c-form2__btnclose__text">詳細条件を閉じる</span></div>

                    @if($p_automotive_search->subcategories->isNotEmpty())
                    <div class="c-form2__row  is-show">
                        <div class="c-form2__label">
                            @if($p_automotive_search->parent_category)
                                {{ $p_automotive_search->parent_category->category_name }}の
                            @endif
                            カテゴリー
                        </div>
                        <div class="c-form2__grcheckbox">
                            @foreach($p_automotive_search->subcategories as $subcategory)
                            <span class="c-form2__cb {{ $subcategory->is_disable }}">
                                <label for="checkbox1{{$subcategory->id}}">
                                    <input type="checkbox" id="checkbox1{{$subcategory->id}}" name="{{ $p_automotive_search->parent_category ? 'child_category[]' : 'subcategory[]' }}" value="{{$subcategory->id}}" {{$subcategory->is_checked}}>
                                    <span>{{ $subcategory->category_name }}</span>
                                </label>
                            </span>
                            @endforeach
                        </div><!-- / c-form2__grcheckbox -->

                    </div><!-- / c-form2__row -->
                    @endif

                    <div class="c-form2__row  is-show">
                        <div class="c-form2__label">硬化剤比率</div>
                        <div class="c-form2__grcheckbox">
                            @foreach($p_automotive_search->hardener_ratios as $ratio)
                            <span class="c-form2__cb {{ $ratio->is_disable }}">
                                <label for="checkbox2{{ $ratio->id }}">
                                    <input type="checkbox" id="checkbox2{{ $ratio->id }}" name="hardener_ratio[]" value="{{ $ratio->id }}" {{ $ratio->is_checked }}>
                                    <span>{{ $ratio->name }}</span>
                                </label>
                            </span>
                            @endforeach
                        </div><!-- / c-form2__grcheckbox -->

                    </div><!-- / c-form2__row -->

                    <div class="c-form2__row  is-show">
                        <div class="c-form2__label">1液/2液</div>
                        <div class="c-form2__grcheckbox">
                            @foreach($p_automotive_search->bases as $base)
                            <span class="c-form2__cb {{ $base->is_disable }}">
                                <label for="checkbox3{{ $base->id }}">
                                    <input type="checkbox" id="checkbox3{{ $base->id }}" name="base[]" value="{{ $base->id }}" {{ $base->is_checked }}>
                                    <span>{{ $base->name }}</span>
                                </label>
                            </span>
                            @endforeach
                        </div><!-- / c-form2__grcheckbox -->

                    </div><!-- / c-form2__row -->

                    <div class="c-form2__row is-show">
                        <div class="c-form2__label">特徴</div>
                        <div class="c-form2__grcheckbox">
                            @foreach($p_automotive_search->characteristics as $characteristic)
                            <span class="c-form2__cb {{ $characteristic->is_disable }}">
                                <label for="checkbox4{{ $characteristic->id }}">
                                    <input type="checkbox" id="checkbox4{{ $characteristic->id }}" name="characteristic[]" value="{{ $characteristic->id }}" {{ $characteristic->is_checked }}>
                                    <span>{{ $characteristic->name }}</span>
                                </label>
                            </span>
                            @endforeach
                        </div><!-- / c-form2__grcheckbox -->

                    </div><!-- / c-form2__row -->

                    <div class="c-form2__rowadd js-c-form2__rowadd">
                        <p class="c-form2__rowadd__text js-open-form2-row is-active">詳細条件を閉じる</p>
                    </div><!-- / c-form2__rowadd -->

                </div>
                <div class="c-form2__btn is-active">
                    <button>絞り込む</button>
                </div>
            </form>
        </div><!-- / c-form2__body -->

    </div>
</div><!-- / c-form2 -->

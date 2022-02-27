<div class="c-tab">
    <ul class="c-tab__switch">
        <li class="c-tab__switch__item {{ !isset($active) || $active=='bridge' ? 'is-active' : '' }}" id="tab-specification1">
            <h3>橋梁・コンクリート</h3>
        </li>
        <li class="c-tab__switch__item {{ isset($active) && $active=='steel' ? 'is-active' : '' }}" id="tab-specification2">
            <h3>プラント・鉄塔・<br class="sp-only">鋼構造物</h3>
        </li>
    </ul>
    <div class="c-tab__wrapper">
        <div class="c-tab__content tab-specification1 {{ !isset($active) || $active=='bridge' ? 'is-active' : '' }}">
            <h4 class="c-title2 c-title2__style3">規格から探す</h4>
            <div class="c-list6 c-list6--col4">
                <ul class="c-list6__box">
                    @foreach($bridge_search->standards as $standard)
                        <li class="c-list6__item arrow">
                            <a href="{{ url('products/large/specification-bridge/standard/'.$standard->slug) }}" class="c-list6__txt">[{{ $standard->p_large_standard_category->name }}] {{ $standard->standard_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="c-tab__content__header">
                <h4 class="c-title2 c-title2__style3">条件で絞り込む</h4>
                <div class="c-block2__header__title ">
                    <div class="c-form2__title2">該当件数
                        <div class="c-form2__title2__number">
                            <div id="count-large-spec-bridge" class="count-number">{{ $bridge_search->totalCount() }}</div>
                            <div class="odometer"></div>
                        </div>件
                    </div>
                </div>
            </div>
            
            
            <form action="{{ url('products/large/specification-bridge') }}" id="{{ !isset($active) || $active=='bridge' ? 'search-form' : '' }}" data-name="large-spec-bridge">
                <div class="c-form2">
                    <div class="c-form2__row">
                        <div class="c-form2__label">規格名</div>
                        <div class="c-form2__grcheckbox">
                            @foreach($bridge_search->standards as $standard)
                                <span class="c-form2__cb">
                                    <label for="checkbox0{{ $standard->id }}">
                                        <input name="standard[]" type="checkbox" id="checkbox0{{ $standard->id }}" value="{{ $standard->id }}" {{ $standard->is_checked }}>
                                        <span>[{{ $standard->p_large_standard_category->name }}] {{ $standard->standard_name }}</span>
                                    </label>
                                </span>
                            @endforeach
                        </div><!-- / c-form2__grcheckbox -->
                    </div>
                    <div class="c-form2__row">
                        <div class="c-form2__label">塗装区分</div>
                        <div class="c-form2__grcheckbox">
                            @foreach($bridge_search->sections as $key => $section)
                                <span class="c-form2__cb {{ $bridge_search->isSectionDisable($key) ? 'is-disable' : '' }}">
                                    <label for="checkbox1{{ $key }}">
                                        <input name="section[]" type="checkbox" id="checkbox1{{ $key }}" value="{{$key}}" {{ $bridge_search->isSectionChecked($key) }}>
                                        <span>{{ $section }}</span>
                                    </label>
                                </span>
                            @endforeach
                        </div><!-- / c-form2__grcheckbox -->
                    </div>

                    <div class="c-form2__row">
                        <div class="c-form2__label">被塗物</div>
                        <div class="c-form2__grcheckbox">
                            @foreach($bridge_search->coated_matters as $coated_matter)
                                <span class="c-form2__cb {{ $coated_matter->is_disable }}">
                                    <label for="checkbox2{{ $coated_matter->id }}">
                                        <input name="coated_matter[]" type="checkbox" id="checkbox2{{ $coated_matter->id }}" value="{{ $coated_matter->id }}" {{ $coated_matter->is_checked }}>
                                        <span>{{ $coated_matter->name }}</span>
                                    </label>
                                </span>
                            @endforeach
                        </div><!-- / c-form2__grcheckbox -->
                    </div>

                    <div class="c-form2__row">
                        <div class="c-form2__label">塗装箇所</div>
                        <div class="c-form2__grcheckbox">
                            @foreach($bridge_search->paint_points as $paint_point)
                                <span class="c-form2__cb {{ $paint_point->is_disable }}">
                                    <label for="checkbox3{{ $paint_point->id }}">
                                        <input name="paint_point[]" type="checkbox" id="checkbox3{{ $paint_point->id }}" value="{{ $paint_point->id }}" {{ $paint_point->is_checked }}>
                                        <span>{{ $paint_point->name }}</span>
                                    </label>
                                </span>
                            @endforeach
                        </div><!-- / c-form2__grcheckbox -->
                    </div>

                    <div class="c-form2__btn">
                        <button type="submit">絞り込む</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="c-tab__content tab-specification2 {{ isset($active) && $active=='steel' ? 'is-active' : '' }}">
            <div class="c-block2__header__title is-single">
                <div class="c-form2__title2">該当件数
                    <div class="c-form2__title2__number">
                        <div id="count-large-spec-steel" class="count-number">{{ $steel_search->totalCount() }}</div>
                        <div class="odometer"></div>
                    </div>件
                </div>
            </div>
            <form action="{{ url('products/large/specification-steele') }}" id="{{ isset($active) && $active=='steel' ? 'search-form' : '' }}" data-name="large-spec-steel">
                <div class="c-form2">
                    <div class="c-form2__row">
                        <div class="c-form2__label">塗装区分</div>
                        <div class="c-form2__grcheckbox">
                            @foreach($steel_search->sections as $key => $section)
                                <span class="c-form2__cb {{ $steel_search->isSectionDisable($key) ? 'is-disable' : '' }}">
                                    <label for="checkbox5{{ $key }}">
                                        <input name="section[]" type="checkbox" id="checkbox5{{ $key }}" value="{{ $key }}" {{ $steel_search->isSectionChecked($key) }}>
                                        <span>{{ $section }}</span>
                                    </label>
                                </span>
                            @endforeach
                        </div><!-- / c-form2__grcheckbox -->
                    </div>
                    <div class="c-form2__row">
                        <div class="c-form2__label">塗料系統</div>
                        <div class="c-form2__grcheckbox">
                            @foreach($steel_search->systems as $system)
                                <span class="c-form2__cb {{ $system->is_disable }}">
                                    <label for="checkbox6{{ $system->id }}">
                                        <input name="system[]" type="checkbox" id="checkbox6{{ $system->id }}" value="{{ $system->id }}" {{ $system->is_checked }}>
                                        <span>{{ $system->name }}</span>
                                    </label>
                                </span>
                            @endforeach
                            <span class="c-form2__cb">
                                        </span>
                        </div><!-- / c-form2__grcheckbox -->
                    </div>

                    <div class="c-form2__row">
                        <div class="c-form2__label">溶剤種別</div>
                        <div class="c-form2__grcheckbox">
                            @foreach($steel_search->solvent_types as $solvent_type)
                                <span class="c-form2__cb {{ $solvent_type->is_disable }}">
                                    <label for="checkbox7{{ $solvent_type->id }}">
                                        <input name="solvent_type[]" type="checkbox" id="checkbox7{{ $solvent_type->id }}" value="{{ $solvent_type->id }}" {{ $solvent_type->is_checked }}>
                                        <span>{{ $solvent_type->name }}</span>
                                    </label>
                                </span>
                            @endforeach
                        </div><!-- / c-form2__grcheckbox -->
                    </div>

                    <div class="c-form2__row">
                        <div class="c-form2__label">適用部位</div>
                        <div class="c-form2__grcheckbox">
                            @foreach($steel_search->points as $point)
                                <span class="c-form2__cb {{ $point->is_disable }}">
                                    <label for="checkbox8{{ $point->id }}">
                                        <input name="point[]" type="checkbox" id="checkbox8{{ $point->id }}" value="{{ $point->id }}" {{ $point->is_checked }}>
                                        <span>{{ $point->name }}</span>
                                    </label>
                                </span>
                            @endforeach
                        </div><!-- / c-form2__grcheckbox -->
                    </div>

                    <div class="c-form2__row">
                        <div class="c-form2__label">特徴</div>
                        <div class="c-form2__grcheckbox">
                            @foreach($steel_search->features as $feature)
                                <span class="c-form2__cb {{ $feature->is_disable }}">
                                    <label for="checkbox9{{ $feature->id }}">
                                        <input name="feature[]" type="checkbox" id="checkbox9{{ $feature->id }}" value="{{ $feature->id }}" {{ $feature->is_checked }}>
                                        <span>{{ $feature->name }}</span>
                                    </label>
                                </span>
                            @endforeach
                            <span class="c-form2__cb">
                                        </span>
                        </div><!-- / c-form2__grcheckbox -->
                    </div>
                    <div class="c-form2__btn">
                        <button type="submit">絞り込む</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

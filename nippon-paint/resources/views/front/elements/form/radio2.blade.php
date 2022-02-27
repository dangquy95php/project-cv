@include('front.elements.form.parts.error', ['name' => $name])

@if (isset($dl_class))
<dl class="{{ $dl_class }}">
@else
<dl>
@endif
    <dt>{{ $label }}@if ($required)<span class="c-form3__label">必須</span>@endif</dt>
    <dd class="c-form3__grcheckbox">
        <div id="{{ $name.'-target' }}" class="c-form3__js-error">
        </div>
        @if (isset($error_text))
        <p class="c-form3__error <? /*is-active*/ ?>">{{ $error_text }}</p>
        @endif
        <div class="c-form3__checkbox c-form3__checkbox--nospace">
            @foreach ($options as $key => $option)
            <span class="c-form3__checkbox__item">
                <label for="form3_cb{{ $key.$pattern }}">
                    {{ Form::radio($name, 'form3_cb'.$key.$pattern ?? '', old($name)===(string)$key, ['id' => 'form3_cb'.$key.$pattern ?? '']) }}
                    <span class="c-form3__checkbox__text">{{ $option }}</span>
                </label>
            </span>
            @endforeach
        </div>
    </dd>
</dl>


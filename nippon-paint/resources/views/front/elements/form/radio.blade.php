@include('front.elements.form.parts.error', ['name' => $name])

<dl>
    <dt>{{ $label }}@if ($required)<span class="c-form3__label">必須</span>@endif</dt>
    <dd class="c-form3__grcheckbox">
        <div id="{{ $name.'-target' }}" class="c-form3__js-error">
        </div>
        @if (isset($error_text))
        <p class="c-form3__error <? /*is-active*/ ?>">{{ $error_text }}</p>
        @endif
        <div class="c-form3__checkbox">
            @foreach ($options as $key => $option)
            <span class="c-form3__checkbox__item">
                <label for="form3_cb{{ $key }}">
                    {{ Form::radio($name, $key, old($name)===(string)$key, ['id' => 'form3_cb'.$key, 'data-prompt-target' => $name.'-target']) }}
                    <span class="c-form3__checkbox__text">{{ $option }}</span>
                </label>
            </span>
            @endforeach
        </div>
    </dd>
</dl>


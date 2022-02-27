@include('front.elements.form.parts.error', ['name' => $name])

<dl>
    <dt>{{ $label }}@if ($required)<span class="c-form3__label">必須</span>@endif</dt>
    <dd>
        <div id="{{ $name.'-target' }}" class="c-form3__js-error">
        </div>
        @if (isset($error_text))
        <p class="c-form3__error <? /*is-active*/ ?>">{{ $error_text }}</p>
        @endif
        <div class="c-form3__textarea <? /*is-error*/ ?>">
            {{ Form::textarea($name, old($name), ['placeholder' => $placeholder, 'id' => $name, 'data-prompt-target' => $name.'-target']) }}
        </div>
    </dd>
</dl>

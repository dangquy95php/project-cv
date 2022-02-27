@include('front.elements.form.parts.error', ['name' => $name])

<dl>
    <dt>{{ $label }}@if ($required)<span class="c-form3__label">必須</span>@endif</dt>
    <dd>
        <div id="{{ $name.'-target' }}" class="c-form3__js-error">
        </div>
        @if (isset($error_text))
        <p class="c-form3__error <? /*is-active*/ ?>">{{ $error_text }}</p>
        @endif
        @if (isset($comment))
        <p class="c-form3__input__text1">{!! $comment !!}</p>
        @endif
        <div class="c-form3__select <? /*is-error*/ ?>">
            {{ Form::select($name, $options, old($name), ['placeholder' => $placeholder, 'id' => $name, 'data-prompt-target' => $name.'-target']) }}
        </div>
    </dd>
</dl>

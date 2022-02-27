@include('front.elements.form.parts.error', ['name' => $name])

@if (isset($dl_class))
<dl class="{{ $dl_class }}">
@else
<dl>
@endif
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
        @if (isset($class))
            <div class="c-form3__input <? /*is-error*/ ?>">
                {{ Form::text($name, old($name), ['placeholder' => $placeholder, 'class' => $class, 'id' => $name, 'data-prompt-target' => $name.'-target' ]) }}
            </div>
        @else
            <div class="c-form3__input <? /*is-error*/ ?>">
                {{ Form::text($name, old($name), ['placeholder' => $placeholder, 'id' => $name, 'data-prompt-target' => $name.'-target' ]) }}
            </div>
        @endif
        @if (isset($annotation))
        <p class="c-form3__input__text2">{!! $annotation !!}</p>
        @endif
    </dd>
</dl>

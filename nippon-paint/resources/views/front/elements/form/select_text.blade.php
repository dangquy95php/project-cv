@include('front.elements.form.parts.error', ['name' => $select_name])
@include('front.elements.form.parts.error', ['name' => $text_name])

<dl>
    <dt>{{ $label }}@if ($required)<span class="c-form3__label">必須</span>@endif</dt>
    <dd>
        <div id="{{ $select_name.'-target' }}" class="c-form3__js-error">
        </div>
        @if (isset($select_error_text))
        <p class="c-form3__error <? /*is-active*/ ?>">{{ $select_error_text }}</p>
        @endif
        @if (isset($select_class))
        <div class="c-form3__select <? /*is-error*/ ?>">
            {{ Form::select($select_name, $select_options, old($select_name), ['placeholder' => $select_placeholder, 'class' => $select_class, 'id' => $select_name, 'data-prompt-target' => $select_name.'-target']) }}
        </div>
        @else
        <div class="c-form3__select <? /*is-error*/ ?>">
            {{ Form::select($select_name, $select_options, old($select_name), ['placeholder' => $select_placeholder, 'id' => $select_name, 'data-prompt-target' => $select_name.'-target']) }}
        </div>
        @endif
        <div id="{{ $text_name.'-target' }}" class="c-form3__js-error">
        </div>
        @if (isset($text_error_text))
        <p class="c-form3__error <? /*is-active*/ ?>">{{ $text_error_text }}</p>
        @endif
        @if (isset($comment))
        <p class="c-form3__input__text1">{!! $comment !!}</p>
        @endif
        @if (isset($select_class))
        <div class="c-form3__input c-form3__input--large <? /*is-error*/ ?>">
            {{ Form::text($text_name, old($text_name), ['placeholder' => $text_placeholder, 'class' => $class, 'id' => $text_name, 'data-prompt-target' => $text_name.'-target']) }}
        </div>
        @else
        <div class="c-form3__input c-form3__input--large <? /*is-error*/ ?>">
            {{ Form::text($text_name, old($text_name), ['placeholder' => $text_placeholder, 'id' => $text_name, 'data-prompt-target' => $text_name.'-target']) }}
        </div>
        @endif
    </dd>
</dl>

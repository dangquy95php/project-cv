<div class="form-group row <?php if(isset($required) && $required) echo 'required' ?> <?= $errors->has($name) ? 'has-error':'' ?>">
    <label class="col-sm-2 col-form-label" for="{{$name}}">
        {{ $label }}
        @if(isset($required) && $required)
        <span class="badge badge-danger float-right">必須</span>
        @endif
    </label>
    <div class="col-sm-10">
        <div class="custom-file">
            {{ Form::file($name, ['class' => "custom-file-input", 'accept' => "application/pdf"]) }}
            <label class="custom-file-label" for="{{ $name }}" data-browse="ファイルを選択"></label>
        </div>
        @include('admin.elements.form.parts.error',['field' => $name])
        @if($value)
            <a href="{{ $path }}">{{ $value }}</a>
        @endif
    </div>
</div>

<div class="form-group row {{ isset($required) && $required ? 'required' : '' }} {{ $errors->has($name) ? 'has-error' : '' }}">
    <label class="col-sm-2 col-form-label" for="{{ $name }}">
        {{ $label }}
        <span class="badge badge-danger float-right {{ isset($requied) && $required ?: 'hide' }}">必須</span>
    </label>
    <div class="col-sm-10">
        <div class="custom-file">
            {{ Form::file($name, ['class' => "custom-file-input", 'accept' => "image/png,image/jpeg,image/gif"]) }}
            <label class="custom-file-label" for="{{ $name }}" data-browse="ファイルを選択"></label>
        </div>
        @include('admin.elements.form.parts.error',['field' => $name])
        @if($value)
        <div class="row">
            <div class="col-10 mt-3">
                <img src="{{ $path }}" class="img-thumbnail" width="200px">
            </div>
        </div>
        @endif
    </div>
</div>

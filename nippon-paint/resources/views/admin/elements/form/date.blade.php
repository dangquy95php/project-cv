<div class="form-group row {{ isset($required) && $required ? 'required' : '' }} {{ $errors->has($name) ? 'has-error':'' }}">
    <label class="col-sm-2 col-form-label" for="{{ $name }}">
        {{ $label }}
        <span class="badge badge-danger float-right {{ isset($required) && $required ?: 'hide' }}">必須</span>
    </label>
    <div class="col-sm-10">
        {{ Form::text($name, $value, ['class' => 'form-control date']) }}
        @include('admin.elements.form.parts.error', ['field' => $name])
    </div>
</div>

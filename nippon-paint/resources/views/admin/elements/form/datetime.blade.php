<div class="form-group row {{ isset($required) && $required ? 'required' : '' }} {{ $errors->has($name) ? 'has-error' : '' }}">
    <label class="col-sm-2 col-form-label" for="{{ $name }}">
        {{ $label }}
        <span class="badge badge-danger float-right {{ isset($required) && $required ?: 'hide' }}">必須</span>
        <span class="badge badge-warning float-right {{ isset($required_public) && $required_public ?: 'hide' }}">公開時必須</span>
    </label>
    <div class="col-sm-10">
        <div class="input-group date datetimepicker" id="{{ $name }}" data-target-input="nearest">
            {{ Form::text($name, $value, ['class' => 'form-control datetimepicker-input', 'data-target' => "#".$name]) }}
            <div class="input-group-append" data-target="#{{ $name }}" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
        @include('admin.elements.form.parts.error', ['field' => $name])
    </div>
</div>

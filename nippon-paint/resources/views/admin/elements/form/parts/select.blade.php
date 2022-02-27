<div class="form-group row <?php if(isset($required) && $required) echo ' requied' ?><?= $errors->has($name) ? ' has-error':'' ?>">
    <label class="col-sm-2 col-form-label" for="{{$name}}">{{ $label }}</label>
    <div class="col-sm-10">
        {{ Form::select($name, $options, $value, ['class' => 'form-control', 'placeholder' => '未選択']) }}
        @include('admin.elements.form.parts.error',['field' => $name])
    </div>
</div>

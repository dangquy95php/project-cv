<div class="form-group row {{ isset($required) && $required ? 'required' : '' }} {{ $errors->has($name) ? 'has-error' : '' }}">
    <label class="col-sm-2 col-form-label" for="{{ $name }}">
        {{ $label }}
        <span class="badge badge-danger float-right {{ isset($required) && $required ?: 'hide' }}">必須</span>
        <span class="badge badge-warning float-right {{ isset($required_public) && $required_public ?: 'hide' }}">公開時必須</span>
    </label>
    <div class="col-sm-10">
        <multiselect-search
            :options="{{ @$options ?: collect() }}"
            :values="{{ @$values ?: collect() }}"
            :selectable_limit="{{ @$selectable_limit ?: collect() }}"
            name="{{ $name }}"
        ></multiselect-search>
        @include('admin.elements.form.parts.message')
        @include('admin.elements.form.parts.error', ['field' => $name])
    </div>
</div>

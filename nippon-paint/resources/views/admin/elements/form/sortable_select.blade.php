<div class="form-group row {{ isset($required) && $required ? 'required' : '' }} {{ $errors->has($name) ? 'has-error' : '' }}">
    <label class="col-sm-2 col-form-label">
        {{ $label }}
        <span class="badge badge-danger float-right {{ isset($required) && $required ?: 'hide' }}">必須</span>
        <span class="badge badge-warning float-right {{ isset($required_public) && $required_public ?: 'hide' }}">公開時必須</span>
    </label>
    <div class="col-sm-10">
        <sortable-select
            name="{{ $name }}"
            :options="{{$options}}"
            :values="{{$values}}"
            :placeholders="{{ @collect($placeholders) ?: collect() }}">
        </sortable-select>
        @include('admin.elements.form.parts.message')
        @include('admin.elements.form.parts.error', ['field' => $name])
    </div>
</div>
@if($errors->has($field))
    @foreach($errors->get($field) as $error)
        <span class="error-message">{{$error}}</span>
    @endforeach
@endif
@if($errors->has($field.'.*'))
    @foreach($errors->get($field.'.*') as $error_arr)
        @foreach($error_arr as $error_item)
            <span class="error-message">{{$error_item}}</span>
        @endforeach
    @endforeach
@endif
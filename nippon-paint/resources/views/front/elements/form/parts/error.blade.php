@if($errors->has($name))
    @foreach($errors->get($name) as $error)
        <p class="error-message">{{$error}}</p>
    @endforeach
@endif
@if($errors->has($name.'.*'))
    @foreach($errors->get($name.'.*') as $error_arr)
        @foreach($error_arr as $error_item)
            <p class="error-message">{{$error_item}}</p>
        @endforeach
    @endforeach
@endif

@if (isset($title2_class) && $title2_class == 'c-title2__style3')
<h3 class="c-title2 {{$title2_class ?? ''}}">{{$title2_text}}</h3>
@else
<h2 class="c-title2 {{$title2_class ?? ''}}">{{$title2_text}}</h2>
@endif

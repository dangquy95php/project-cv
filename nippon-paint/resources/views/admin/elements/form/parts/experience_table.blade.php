<table class="table">
    <thead>
    <tr>
        <th class="space col-sm-1"></th>
        @foreach($experience as $year)
            <th class="col-sm-1">{{$year}}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($options as $key => $option)
        <tr>
            <th>{{$option}}</th>
            @foreach($experience as $year)
                <td><input type="radio" name="{{$name}}.{{$key}}" value="{{$option}}：{{$year}}" {{$staffu->$check($option.'：'.$year)}}></td>
            @endforeach
        </tr>
    @endforeach
    @if(isset($name_other) && isset($value_other))
    <tr>
        <th>その他</th>
        <td colspan="5">
            {!! Form::textarea($name_other, $value_other, ['class' => 'form-control', 'size' => '30x4']) !!}
        </td>
    </tr>
    @endif
    </tbody>
</table>
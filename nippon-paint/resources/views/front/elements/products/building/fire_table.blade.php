<div class="c-table">
    <table>
        <thead>
        <tr>
            <th>製品名</th>
            <th>証明書</th>
            <th>製品詳細</th>
        </tr>
        </thead>
        <tbody>
        @foreach($certs as $cert)
            @foreach($cert->published_p_buildings as $p_building)
            <tr>
                <td class="text-left-sp">{{ $p_building->product_name }}</td>
                <td class="td__pdf"><a href="{{ $cert->document_url_path }}" target="_blank">防火材料等証明書</a></td>
                <td class="td__arrow"><a href="{{ url('products/building/'.$p_building->id) }}">製品詳細を見る</a></td>
            </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
</div>
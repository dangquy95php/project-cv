<div class="c-table">
    <table>
        <thead>
        <tr>
            <th>カタログ</th>
            <th>製品名</th>
            <th>一般名称</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category->published_p_buildings_with_catalog as $p_building)
            @foreach($p_building->catalogs as $catalog)
                <tr>
                    <td class="td__pdf"><a href="{{ $catalog->document_url_path }}" target="_blank">{{ $catalog->document_name }}</a></td>
                    <td class="td__arrow"><a href="{{ url('products/building/'.$p_building->id) }}">{{ $p_building->product_name }}</a></td>
                    <td>{{ $p_building->general_name }}</td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
</div><!-- / c-table -->
<x-header>
    <x-slot name="title">{{ $p_building_search->initial }}行｜建築用塗料カタログダウンロード｜日本ペイント株式会社</x-slot>
    <x-slot name="description">日本ペイント株式会社の建築用塗料カタログの検索ページです。「{ア}行」のカタログ一覧です。豊富なラインナップからお選びください。</x-slot>
    <x-slot name="keywords">keywords, keywords</x-slot>
    <x-slot name="slug">{{ $p_building_search->initial }}行｜建築用塗料カタログダウンロード｜日本ペイント株式会社</x-slot>
    <x-slot name="unique">products_large</x-slot>
    <x-slot name="og_type">article</x-slot>
    <x-slot name="url">https://www.nipponpaint.co.jp/products/building/catalog/initial/{{ $p_building_search->initial }}/</x-slot>
</x-header>

<main class="p-bcataloginit">
    <section class="c-mainimg2">
        <div class="l-cont">
            <h2 class="c-mainimg2__title">{{ $p_building_search->initial }}行<span>／ 建築用塗料カタログダウンロード</span></h2>
        </div>
    </section>

    <div class="c-breadcrumb">
        <div class="l-cont">
            <ul>
                <li><a href="/">日本ペイントHOME</a></li>
                <li><a href="/products/">製品情報</a></li>
                <li><a href="/products/building/">建築用塗料</a></li>
                <li><a href="/products/building/catalog/">資料</a></li>
                <li><span>建築用塗料{{ $p_building_search->initial }}行</span></li>
            </ul>
        </div>
    </div>


    <section class="p-bcataloginit1">
        <div class="l-cont">
            @include('front.elements.products.building.kana_search_small')

            @if($p_buildings->count() > 0)
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
                        @foreach($p_buildings as $p_building)
                        <tr>
                            <td class="td__pdf"><a href="{{ $p_building::getS3Url(\App\Models\Document::$document_path.'/'.$p_building->document_file) }}">{{ $p_building->document_name }}</a></td>
                            <td class="td__arrow"><a href="{{ url('products/building/'.$p_building->p_building_id) }}">{{ $p_building->product_name }}</a></td>
                            <td>{{ $p_building->general_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- / c-table -->
            @endif

            <x-block1>
                <x-slot name="select_list">2</x-slot>
            </x-block1>
        </div>
    </section>

</main>

<x-footer></x-footer>

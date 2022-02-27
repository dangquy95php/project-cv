@foreach($productSearch->sliceBaseData as $base)
    @if($base['type'] === $productSearch::F_BUILDING_ID)
        @include('front.elements.products.search.building')
    @endif
    @if($base['type'] === $productSearch::F_LARGE_ID)
        @include('front.elements.products.search.large')
    @endif
    @if($base['type'] === $productSearch::F_LARGE_SPEC_BRIDGE_ID)
        @include('front.elements.products.search.large_spec')
    @endif
    @if($base['type'] === $productSearch::F_LARGE_SPEC_STEEL_ID)
        @include('front.elements.products.search.large_spec')
    @endif
    @if($base['type'] === $productSearch::F_AUTOMOTIVE_ID)
        @include('front.elements.products.search.automotive')
    @endif
@endforeach

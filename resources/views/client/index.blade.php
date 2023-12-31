@extends('client.layouts.base')

@section('content')
    <div class="p-2">
        <h3 class="p-3">{{ __('front.products') }}</h3>
        <div class="card-deck equal-height-cards">
            <div class="row">
                @foreach($products as $product)
                    @include('client.product', ['product' => $product, 'currency' => $currency])
                @endforeach
            </div>
        </div>
        {{ $products->withQueryString()->links() }}
    </div>
@endsection

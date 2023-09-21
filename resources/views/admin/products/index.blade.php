@extends('admin.layouts.base')

@section('content')
    <div class="row">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <aside class="col-2 p-2">
            <h3 class="p-3">Filters</h3>
            <form class="mb-4" action="#" method="get">
                <div class="form-group mb-4">
                    <label class="mb-2" for="manufacturer">Manufacturer:</label>
                    <select class="form-control" id="manufacturer" name="filter[manufacturer]">
                        <option value=""></option>
                        @foreach($products as $product)
                            <option value="{{ $product->manufacturer }}">{{ $product->manufacturer }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label class="mb-2" for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="filter[title]">
                </div>
                <div class="form-group mb-4">
                    <label class="mb-2" for="sorting">Sorting:</label>
                    <select class="form-control" id="sorting" name="sort">
                        <option value="title">Title</option>
                        <option value="manufacturer">Manufacturer</option>
                        <option value="price">Price</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Apply Filters</button>
            </form>
        </aside>
        <div class="col-10 p-2">
            <h3 class="p-3">{{ __('front.products') }}</h3>
            <div class="card-deck equal-height-cards">
                <div class="row">
                    @foreach($products as $product)
                        @include('admin.products.product', ['product' => $product])
                    @endforeach
                </div>
            </div>
            {{ $products->withQueryString()->links() }}
        </div>
    </div>
@endsection

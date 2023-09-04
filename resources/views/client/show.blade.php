@extends('client.layouts.base')

@section('content')
    <div class="card-body">
        <div class="w-50">
            <img class="mw-100" src="/laptop.jpg" alt="laptop image">
        </div>
        <h5 class="card-title my-3">{{ $product->title }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text">Manufacturer: {{ $product->manufacturer }}</p>
        <p class="card-text">Release Date: {{ $product->release_date }} year</p>
        <p class="card-text" data-product-price="{{ $product->price }}">Price: {{ $product->price }} BYN</p>
        <h5>Select additional services:</h5>
        <form id="services" class="mb-2">
            @foreach($services as $service)
                <label class="">
                    <input type="checkbox" name="service" data-service-price="{{ $service->price }}" value="{{ $service->title }}">
                    {{ $service->title }}. {{ $service->price }} BYN. Term: {{ $service->terms }} days.
                </label>
                <br>
            @endforeach
        </form>
        <h5><b>Final price:</b> <span id="totalPrice"></span> BYN</h5>
    </div>
@endsection

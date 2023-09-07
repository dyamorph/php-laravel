@extends('client.layouts.base')

@section('content')
    <div class="card-body">
        <div class="w-50">
            <img class="mw-100" src="/laptop.jpg" alt="laptop image">
        </div>
        <h5 class="card-title my-3">{{ $product->title }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text">{{ __('front.manufacturer') }}: {{ $product->manufacturer }}</p>
        <p class="card-text">{{ __('front.release_date') }}: {{ $product->release_date }}</p>
        <p class="card-text" data-product-price="{{ $product->price }}">{{ __('front.price') }}: {{ $product->price }}</p>
        <h5>{{ __('front.select_services') }}:</h5>
        <form id="services" class="mb-2">
            @foreach($services as $service)
                <label class="">
                    <input type="checkbox" name="service" data-service-price="{{ $service->price }}" value="{{ $service->title }}">
                    {{ $service->title }}. {{ $service->price }} BYN. Term: {{ $service->terms }} days.
                </label>
                <br>
            @endforeach
        </form>
        <h5><b>{{ __('front.final_price') }}:</b> <span id="totalPrice"></span></h5>
    </div>
@endsection
@section('scripts')
    @vite(['resources/js/checkPrice.js'])
@endsection

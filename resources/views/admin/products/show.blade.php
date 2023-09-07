@extends('admin.layouts.base')

@section('content')
    <div class="card-body">
        <div class="w-50">
            <img class="mw-100" src="/laptop.jpg" alt="laptop image">
        </div>
        <h5 class="card-title my-3">{{ $product->title }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text">{{ __('front.manufacturer') }}: {{ $product->manufacturer }}</p>
        <p class="card-text">{{ __('front.release_date') }}: {{ $product->release_date->format('d-m-Y') }}</p>
        <p class="card-text">{{ __('front.price') }}: {{ $product->price }}</p>
        <div class="d-flex gap-2">
            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="{{ __('front.delete') }}">
            </form>
        </div>
    </div>
@endsection

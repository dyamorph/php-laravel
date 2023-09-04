@extends('admin.layouts.base')

@section('content')
    <div class="card-body">
        <div class="w-50">
            <img class="mw-100" src="/laptop.jpg" alt="laptop image">
        </div>
        <h5 class="card-title my-3">{{ $product->title }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text">Manufacturer: {{ $product->manufacturer }}</p>
        <p class="card-text">Release Date: {{ $product->release_date }} year</p>
        <p class="card-text">Price: {{ $product->price }} BYN</p>
        <div class="d-flex gap-2">
            <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit</a>
            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </div>
    </div>
@endsection

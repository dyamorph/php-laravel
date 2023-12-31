@extends('admin.layouts.base')

@section('content')
    <h3 class="mb-4 mt-4">{{ __('front.edit_product') }}</h3>
    <form class="col-6" action="{{ route('products.update', $product->id) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="mb-3">
            <label for="title" class="form-label">{{ __('front.title') }}</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Macbook Air" value="{{ $product->title }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{ __('front.description') }}</label>
            <textarea name="description" type="text" class="form-control" id="description" placeholder="Ultralight laptop">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="manufacturer" class="form-label">{{ __('front.manufacturer') }}</label>
            <input name="manufacturer" type="text" class="form-control" id="manufacturer" placeholder="Apple" value="{{ $product->manufacturer }}">
        </div>
        <div class="mb-3">
            <label for="release-date" class="form-label">{{ __('front.release_date') }}</label>
            <input name="release_date" type="text" class="form-control" id="release-date" placeholder="2020" value="{{ $product->release_date }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">{{ __('front.price') }}</label>
            <input name="price" type="text" class="form-control" id="price" placeholder="3000" value="{{ $product->price }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('front.edit_product') }}</button>
    </form>
@endsection

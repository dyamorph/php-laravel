<div class="col-md-4 mb-3 d-flex align-items-stretch">
    <div class="card mb-4">
        <div class="card-body">
            <div class="w-100">
                <a href="{{ route('product.show', $product->id) }}">
                    <img class="mw-100" src="/laptop.jpg" alt="laptop image">
                </a>
            </div>
            <h5 class="card-title my-3">{{ $product->title }}</h5>
            <p class="card-text description">{{ $product->description }}</p>
            <p class="card-text">Manufacturer: {{ $product->manufacturer }}</p>
            <p class="card-text">Release Date: {{ $product->release_date }} year</p>
            <p class="card-text">Price: {{ $product->price }} BYN</p>
        </div>
    </div>
</div>

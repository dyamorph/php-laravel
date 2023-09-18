<li class="list-group-item d-flex align-items-center justify-content-between">
    <div class="d-flex gap-4">
        <h5 class="card-title">{{ $service->title }}</h5>
        <p class="card-text m-0">{{ __('front.terms') }}: {{ $service->terms }}</p>
        <p class="card-text">{{ __('front.price') }}: {{ $service->price }}</p>
    </div>
    <div class="d-flex gap-2">
        <a class="btn btn-primary" href="{{ route('services.edit', $service->id) }}">Edit</a>
        <form action="{{ route('services.destroy', $service->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="{{ __('front.delete') }}">
        </form>
    </div>
</li>

<li class="list-group-item d-flex align-items-center justify-content-between">
    <div class="d-flex gap-4">
        <h5 class="card-title">{{ $service->title }}</h5>
        <p class="card-text m-0">Terms: {{ $service->terms }} days</p>
        <p class="card-text">Price: {{ $service->price }} BYN</p>
    </div>
    <div class="d-flex gap-2">
        <a class="btn btn-primary" href="{{ route('service.edit', $service->id) }}">Edit</a>
        <form action="{{ route('service.destroy', $service->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>
</li>

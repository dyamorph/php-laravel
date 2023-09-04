@extends('admin.layouts.base')

@section('content')
    <section class="px-3">
        <h3 class="mb-4 mt-4">Add new service</h3>
        <form class="col-6" action="{{ route('service.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Warranty service">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Terms, days</label>
                <input name="terms" type="text" class="form-control" id="terms" placeholder="2">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price, BYN</label>
                <input name="price" type="text" class="form-control" id="price" placeholder="30">
            </div>
            <button type="submit" class="btn btn-primary">Add service</button>
        </form>
    </section>
@endsection

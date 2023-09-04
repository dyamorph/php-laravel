@extends('admin.layouts.base')

@section('content')
    <div class="p-2">
        <h3 class="p-3">Available services</h3>
        <div class="list-group">
            @foreach($services as $service)
                @include('admin.services.service', ['service' => $service])
            @endforeach
        </div>
    </div>
@endsection

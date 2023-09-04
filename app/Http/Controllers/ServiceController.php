<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store()
    {
        $service = request()->validate([
            'title' => '',
            'terms' => '',
            'price' => ''
        ]);

        Service::create($service);

        return redirect()->route('service.index');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Service $service)
    {
        $data = request()->validate([
            'title' => '',
            'terms' => '',
            'price' => ''
        ]);

        $service->update($data);

        return redirect()->route('service.index');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index');
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Data\ServiceData;
use App\Models\Service;
use App\Repositories\Interfaces\ServiceRepositoryInterface as ServiceRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function __construct(
        protected readonly ServiceRepository $serviceRepository
    ) {}

    public function index(): View
    {
        return view('admin.services.index', ['services' => $this->serviceRepository->all()]);
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(ServiceData $data): RedirectResponse
    {
        $this->serviceRepository->store($data);

        return redirect()->route('services.index');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', ['service' => $service]);
    }

    public function update(Service $service, ServiceData $data): RedirectResponse
    {
        $this->serviceRepository->update($service, $data);

        return redirect()->route('services.index');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $this->serviceRepository->destroy($service);

        return redirect()->route('services.index');
    }
}

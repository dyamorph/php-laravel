<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Data\ServiceData;
use App\Models\Service;
use App\Repositories\Interfaces\ServiceRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function all(): Collection
    {
        return Service::all();
    }

    public function store(ServiceData $data): Service
    {
        return Service::create($data->all());
    }

    public function update(Service $service, ServiceData $data): Service
    {
        $service->update($data->all());

        return $service;
    }

    public function destroy(Service $service): bool
    {
        $service->delete();

        return true;
    }
}

<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Data\ServiceData;
use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

interface ServiceRepositoryInterface
{
    public function all(): Collection;

    public function store(ServiceData $data): Service;

    public function update(Service $service, ServiceData $data): Service;

    public function destroy(Service $service): bool;
}

<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Data\ServiceData;
use App\Models\Service;

interface ServiceRepositoryInterface
{
    public function all();
    public function store(ServiceData $data);
    public function update(Service $service, ServiceData $data);
    public function destroy(Service $service);
}

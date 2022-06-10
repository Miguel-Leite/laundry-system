<?php

namespace App\Repository;

use App\Models\Service;

class ServicesRepository
{
    public function create(array | object $data)
    {
        $service = Service::create($data);
        if ($service) return true;
        return false;
    }

    public function update(Service $service, array | object $data)
    {
        if (!$service) return false;
        $service->update($data);
        return true;
    }
}
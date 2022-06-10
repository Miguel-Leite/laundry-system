<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Repository\ServicesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    /**
     * A basic feature test create service.
     *
     * @return void
     */
    public function create()
    {
        $servicesRepository = new ServicesRepository();
        $service = $servicesRepository->create([
            "name" => "Lavagem de camisas",
            "description" => "",
            "price" => 2000,
            "created_at" => date_create()->format('Y-m-d H:i:s'),
            "updated_at" => date_create()->format('Y-m-d H:i:s')

        ]);
        $this->assertTrue($service);
    }

    public function test_update()
    {
        $servicesRepository = new ServicesRepository();
        $service = $servicesRepository->update(Service::find(2),['price' => 3000]);
        $this->assertTrue($service);
    }
}

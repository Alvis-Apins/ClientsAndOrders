<?php

namespace App\Services;

use App\Repositories\ClientsDeliveriesRepository;

class ClientsDeliveriesService
{
    private ClientsDeliveriesRepository $clientsDeliveriesRepository;

    public function __construct(ClientsDeliveriesRepository $clientsDeliveriesRepository)
    {
        $this->clientsDeliveriesRepository = $clientsDeliveriesRepository;
    }

    public function execute(): array
    {
        return $this->clientsDeliveriesRepository->getReportData();
    }
}

<?php

namespace App\Services;

use App\Repositories\LastOrderRepository;

class LastOrderService
{
    private LastOrderRepository $lastOrderRepository;

    public function __construct(LastOrderRepository $lastOrderRepository)
    {
        $this->lastOrderRepository = $lastOrderRepository;
    }

    public function execute(): array
    {
        return $this->lastOrderRepository->getReportData();
    }
}

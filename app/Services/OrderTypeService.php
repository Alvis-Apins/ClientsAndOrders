<?php

namespace App\Services;

use App\Repositories\OrderTypeRepository;

class OrderTypeService
{
    private OrderTypeRepository $orderTypeRepository;

    public function __construct(OrderTypeRepository $orderTypeRepository)
    {
        $this->orderTypeRepository = $orderTypeRepository;
    }

    public function execute(): array
    {
        return $this->orderTypeRepository->getReportData();
    }
}

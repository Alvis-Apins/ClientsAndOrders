<?php

namespace App\Services;

use App\Repositories\InactiveClientRepository;

class InactiveClientService
{
    private InactiveClientRepository $inactiveClientRepository;

    public function __construct(InactiveClientRepository $inactiveClientRepository)
    {
        $this->inactiveClientRepository = $inactiveClientRepository;
    }

    public function execute(): array
    {
        return $this->inactiveClientRepository->getReportData();
    }
}

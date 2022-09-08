<?php

namespace App\Http\Controllers;

use App\Services\ClientsDeliveriesService;
use Illuminate\View\View;

class ClientsDeliveriesController extends Controller
{
    public function index(ClientsDeliveriesService $clientsDeliveriesService): View
    {
        $deliveriesInfo = $clientsDeliveriesService->execute();

        return view('clients-deliveries', [
            'deliveries' => $deliveriesInfo[0],
            'clients' => $deliveriesInfo[1]
        ]);
    }
}

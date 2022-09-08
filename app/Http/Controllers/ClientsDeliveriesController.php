<?php

namespace App\Http\Controllers;

use App\Services\ClientsDeliveriesService;
use Illuminate\View\View;

class ClientsDeliveriesController extends Controller
{
    public function index(ClientsDeliveriesService $clientsDeliveriesService): View
    {
        $deliveriesInfo = $clientsDeliveriesService->execute();

//        echo "<pre>";
//        var_dump($deliveries[0]);
//        die;

        return view('clients-deliveries', [
            'deliveries' => $deliveriesInfo[0],
            'clients' => $deliveriesInfo[1]
        ]);
    }
}

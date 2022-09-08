<?php

namespace App\Http\Controllers;

use App\Services\LastOrderService;

class LastOrdersController extends Controller
{
    public function index(LastOrderService $lastOrderService)
    {
        $clients = $lastOrderService->execute();

        return view('last-orders', [
            'clients' => $clients
        ]);
    }
}

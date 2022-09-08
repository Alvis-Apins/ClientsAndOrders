<?php

namespace App\Http\Controllers;

use App\Services\LastOrderService;
use Illuminate\View\View;

class LastOrdersController extends Controller
{
    public function index(LastOrderService $lastOrderService): View
    {
        $clients = $lastOrderService->execute();

        return view('last-orders', [
            'clients' => $clients
        ]);
    }
}

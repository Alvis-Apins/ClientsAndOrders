<?php

namespace App\Http\Controllers;

use App\Services\OrderTypeService;
use Illuminate\View\View;

class OrderTypesController extends Controller
{
    public function index(OrderTypeService $orderTypeService): View
    {
        $clients = $orderTypeService->execute();

        return view('order-type', [
            'clients' => $clients
        ]);
    }
}

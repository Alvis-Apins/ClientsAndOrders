<?php

namespace App\Http\Controllers;

use App\Services\InactiveClientService;
use Illuminate\View\View;

class InactiveClientsController extends Controller
{
    public function index(InactiveClientService $inactiveClientService): View
    {
        $clients = $inactiveClientService->execute();

        return view('inactive-clients', [
            'clients' => $clients
        ]);
    }
}

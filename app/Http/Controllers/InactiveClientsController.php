<?php

namespace App\Http\Controllers;

use App\Repositories\InactiveClientRepository;
use App\Services\InactiveClientService;
use Illuminate\Http\Request;

class InactiveClientsController extends Controller
{
    public function index(InactiveClientService $inactiveClientService)
    {
        $clients = $inactiveClientService->execute();

        return view('inactive-clients', [
            'clients' => $clients
        ]);
    }
}

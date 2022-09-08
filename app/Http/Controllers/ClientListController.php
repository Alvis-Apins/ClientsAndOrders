<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ClientListController extends Controller
{
    public function index(): View
    {
        $clients = DB::table('clients')->paginate(10);

        return view('client-list', [
            'clients' => $clients,
            'addresses' => []
        ]);
    }

    public function show(Request $request): JsonResponse
    {
        $addresses = DB::table('addresses')
            ->select('title')
            ->where('client_id', '=', "$request->client_id")
            ->get();

        return response()->json(['response' => $addresses]);
    }


    public function redirect(Request $request):RedirectResponse
    {
        $this->validate($request, [
            'client' => ['string']
        ]);

        $request->session()->put('key', 'value');
        session(['key' => $request->client]);

//        echo "<pre>";
//        var_dump($request->session()->all());
//        die;
        return redirect('/clients-deliveries');
    }
}

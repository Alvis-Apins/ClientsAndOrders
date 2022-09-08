<?php

namespace App\Http\Controllers;

use App\Services\OrderTypeService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

class OrderTypesController extends Controller
{
    public function index(OrderTypeService $orderTypeService):View
    {
        $clients = $orderTypeService->execute();

//        echo "<pre>";
//        var_dump($clients );
//        die;

//        $perPage = 20;
//        $currentPage = request("page") ?? 1;
//
//        $pagination = new LengthAwarePaginator(
//            $clients,
//            count($clients),
//            $perPage,
//            $currentPage,
//            [
//                'path' => request()->url(),
//                'query' => request()->query(),
//            ]
//        );

        return view('order-type', [
            'clients' => $clients
        ]);
    }
}

<?php

namespace App\Repositories;

use App\Models\DeliveriesInfo;
use Illuminate\Support\Facades\DB;

class ClientsDeliveriesRepository implements Report
{
    public function getReportData(): array
    {
        $value = (int) session('key');
//        var_dump($value);
//        die;
        $client = DB::table('clients')
            ->where('id','=',"$value")
            ->get();

        $deliveryTotals = DB::table('delivery_lines')
            ->select('delivery_id', DB::raw('sum(delivery_lines.price*delivery_lines.qty) AS total'))
            ->groupBy('delivery_id');

        $clientsDeliveries = DB::table('deliveries')
            ->groupBy('deliveries.id')
            ->join('addresses', 'addresses.id','=','deliveries.address_id')
            ->join('routes', 'routes.id', '=', 'deliveries.route_id')
            ->joinSub($deliveryTotals, 'delivery_total', function ($join) {
                $join->on('deliveries.id', '=', 'delivery_total.delivery_id');
            })
            ->select('addresses.title', 'routes.date', 'delivery_total.total', 'deliveries.status')
            ->where('addresses.client_id', '=', "$value")
            ->get();
        $clientsDeliveries = json_decode($clientsDeliveries);



        $deliveries = [];
        foreach ($clientsDeliveries as $delivery){
            $deliveries[] = new DeliveriesInfo(
                $delivery->title,
                $delivery->date,
                $delivery->total,
                $delivery->status
            );
        }

//        echo "<pre>";
//        var_dump($deliveries);
//        die;

        return [$deliveries, $client];
    }
}

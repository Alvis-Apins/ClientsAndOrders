<?php

namespace App\Repositories;

use App\Models\ExtensiveClientInfo;
use Illuminate\Support\Facades\DB;

class LastOrderRepository implements Report
{

    public function getReportData(): array
    {
        $lastDelivery = DB::table('deliveries')
            ->groupBy('address_id')
            ->select('address_id', DB::raw('MAX(deliveries.updated_at) AS last_delivered'))
            ->where('status', '=', 2);

        $deliveryData = DB::table('deliveries')
            ->select('type', 'deliveries.id', 'created_at', 'deliveries.address_id')
            ->where('status', '=', 2)
            ->joinSub($lastDelivery, 'last_delivery', function ($join) {
                $join->on('updated_at', '=', 'last_delivery.last_delivered');
            });

        $deliveryTotals = DB::table('delivery_lines')
            ->select('delivery_id', DB::raw('sum(delivery_lines.price*delivery_lines.qty) AS total'))
            ->groupBy('delivery_id');

        $clientsLastOrders = DB::table('addresses')
            ->join('clients', 'clients.id', '=', 'addresses.client_id')
            ->groupBy('addresses.id')
            ->leftJoinSub($deliveryData, 'last_delivery', function ($join) {
                $join->on('addresses.id', '=', 'last_delivery.address_id');
            })
            ->leftJoinSub($deliveryTotals, 'delivery_total', function ($join) {
                $join->on('last_delivery.id', '=', 'delivery_total.delivery_id');
            })
            ->select(
                'clients.name',
                'addresses.title',
                'last_delivery.created_at',
                'last_delivery.type',
                'delivery_total.total')
            ->get();
        $clientsLastOrders = json_decode($clientsLastOrders);


//        echo "<pre>";
//        var_dump($clientsLastOrders);
//        die;

        $clients = [];
        foreach ($clientsLastOrders as $lastOrder) {
            $clients[] = new ExtensiveClientInfo(
                $lastOrder->name,
                $lastOrder->title,
                $lastOrder->created_at,
                $lastOrder->type,
                $lastOrder->total
            );
        }

        return $clients;
    }
}

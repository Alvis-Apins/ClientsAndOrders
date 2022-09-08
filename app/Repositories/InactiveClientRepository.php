<?php

namespace App\Repositories;

use App\Models\SimpleClientInfo;
use Illuminate\Support\Facades\DB;

class InactiveClientRepository implements Report
{
    public function getReportData(): array
    {
        $clientsSolidOrders = DB::table('clients')
            ->join('addresses', 'client_id', '=', 'clients.id')
            ->join('deliveries', 'address_id', '=', 'addresses.id')
            ->select('clients.name', 'addresses.title', 'deliveries.address_id')
            ->where('deliveries.type', '=', 2)
            ->get();
        $clientsSolidOrders = json_decode($clientsSolidOrders);

        $clientsLiquidOrders = DB::table('deliveries')
            ->select('address_id')
            ->where('type', '<', 2)
            ->get();
        $clientsLiquidOrders = json_decode($clientsLiquidOrders);

        $solidOrderAddresses = [];
        foreach ($clientsLiquidOrders as $addressId) {
            if (!in_array($addressId->address_id, $solidOrderAddresses)) {
                $solidOrderAddresses[] = $addressId->address_id;
            }
        }

        $clientsInfo = [];
        $addressesId = [];
        foreach ($clientsSolidOrders as $client) {
            if (!in_array($client->address_id, $solidOrderAddresses)) {
                if (!in_array($client->address_id, $addressesId)) {
                    $addressesId[] = $client->address_id;

                    $clientsInfo[] = new SimpleClientInfo(
                        $client->name,
                        $client->title
                    );
                }
            }
        }
        return $clientsInfo;
    }
}

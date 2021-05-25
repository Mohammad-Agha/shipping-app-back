<?php

namespace App\GraphQL\Mutations;

use App\Models\Shipment;

class CreateShipment
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): Shipment
    {
        $file = $args['waybill'];
        $fileName = $file->storePublicly('public');

        return Shipment::create([
            'waybill' => basename($fileName),
            'customer_address' => $args['customer_address'],
            'customer_name' => $args['customer_name'],
            'customer_phone' => $args['customer_phone'],
            'user_id' => $args['user_id']
        ]);
    }
}

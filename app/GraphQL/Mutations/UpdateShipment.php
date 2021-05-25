<?php

namespace App\GraphQL\Mutations;

use App\Models\Shipment;
use Illuminate\Support\Facades\Storage;

class UpdateShipment
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): ?Shipment
    {
        $shipment = Shipment::find($args['id']);
        if ($shipment) {
            $path = "";
            if ($args['waybill']) {
                if ($shipment->waybill) {
                    Storage::disk('public')->delete($shipment->waybill);
                    $path = Storage::disk('public')->put('', $args['waybill']);
                } else {
                    $path = Storage::disk('public')->put('', $args['waybill']);
                }
            }
            $args['customer_phone'] && $shipment->customer_phone = $args['customer_phone'];
            $args['customer_address'] && $shipment->customer_address = $args['customer_address'];
            $args['customer_name'] && $shipment->customer_name = $args['customer_name'];
            if ($path != "") {
                $shipment->waybill = $path;
            }
            $shipment->save();
            return $shipment;
        }
        return null;
    }
}

<?php

namespace App\GraphQL\Mutations;

use App\Models\Shipment;
use Illuminate\Support\Facades\Storage;

class DeleteShipment
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): ?Shipment
    {
        $deleteShipment = Shipment::find($args['id']);
        if($deleteShipment->waybill) {
            Storage::disk('public')->delete($deleteShipment->waybill);
        }
        $deleteShipment->delete();
        return $deleteShipment;
    }
}

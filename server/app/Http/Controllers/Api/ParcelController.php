<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

use Carbon\Carbon;

class ParcelController extends Controller
{
    public function list()
    {
        $userId = auth('sanctum')->user()->id;

        $parcels = Order::with('biker')->where('sender_id', $userId)->get();

        return response()->json([
            'parcels' => $parcels,
        ]);
    }

    public function listForBikers()
    {
        $parcels = Order::with('sender')->where('biker_id', null)->get();

        return response()->json([
            'parcels' => $parcels,
        ]);
    }

    public function store(Request $request)
    {
        $userId = auth('sanctum')->user()->id;

        $parcel = Order::create([
            'parcel_name' => $request->parcel_name,
            'pickup_address' => $request->pickup_address,
            'dropoff_address' => $request->dropoff_address,
            'status' => 'Pending',
            'sender_id' => $userId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    public function update(Request $request)
    {
        $userId = auth('sanctum')->user()->id;

        $parcel = Order::findOrFail($request->id)->update([
            'pickup_date' => $request->pickup_date,
            'delivery_date' => $request->delivery_date,
            'status' => 'Picked Up',
            'biker_id' => $userId,
            'updated_at' => Carbon::now(),
        ]);
    }
}

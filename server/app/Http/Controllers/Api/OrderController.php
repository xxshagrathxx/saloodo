<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

use Carbon\Carbon;

class OrderController extends Controller
{
    public function listBikersOrders()
    {
        $userId = auth('sanctum')->user()->id;

        $orders = Order::with('sender')->where('biker_id', $userId)->get();

        return response()->json([
            'orders' => $orders,
        ]);
    }

    public function updateStatus($parcelId)
    {
        $order = Order::findOrFail($parcelId)->update([
            'status' => 'Delivered',
            'updated_at' => Carbon::now(),
        ]);
    }
}

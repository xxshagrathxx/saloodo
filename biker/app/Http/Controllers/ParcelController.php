<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;

use Carbon\Carbon;

class ParcelController extends Controller
{
    public function list(Request $request)
    {
        if(!Session::has('token'))
            return abort(403);

        $currentHost = config('global.api_current_host');
        $getApi = Http::withToken(Session::get('token'))->get($currentHost."/api/v1/parcel/list-for-bikers");

        $parcelsArr = json_decode($getApi);

        return view('pages.parcel.list', compact('parcelsArr'));
    }

    public function create($parcelId)
    {
        return view('pages.parcel.create', compact('parcelId'));
    }

    public function update(Request $request)
    {
        if(!Session::has('token'))
            return abort(403);

        $request->validate([
    		'pickup' => 'required',
    		'delivery' => 'required',
    	],[
    		'pickup.required' => 'This field is required',
    		'delivery.required' => 'This field is required',
    	]);

        $currentHost = config('global.api_current_host');
        $postApi = $currentHost."/api/v1/parcel/update";

        $response = Http::asForm()->withToken(Session::get('token'))->post($postApi, [
            'id' => $request->parcelId,
            'pickup_date' => Carbon::parse($request->pickup)->format('Y-m-d h:i:s'),
            'delivery_date' => Carbon::parse($request->delivery)->format('Y-m-d h:i:s'),
        ]);

        $response = json_decode($response);

        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('parcel.list')->with($notification);
    }

    public function listBikersOrders()
    {
        if(!Session::has('token'))
            return abort(403);

        $currentHost = config('global.api_current_host');
        $getApi = Http::withToken(Session::get('token'))->get($currentHost."/api/v1/order/list-biker-orders");

        $ordersArr = json_decode($getApi);

        return view('pages.order.list', compact('ordersArr'));
    }

    public function updateStatus($parcelId)
    {
        if(!Session::has('token'))
            return abort(403);

        $currentHost = config('global.api_current_host');
        $getApi = Http::withToken(Session::get('token'))->get($currentHost."/api/v1/order/update/status/".$parcelId);

        $response = json_decode($getApi);

        $notification = array(
            'message' => 'Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('parcel.list')->with($notification);
    }
}


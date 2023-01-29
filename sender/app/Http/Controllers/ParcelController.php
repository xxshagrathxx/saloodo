<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;

class ParcelController extends Controller
{
    public function list(Request $request)
    {
        if(!Session::has('token'))
            return abort(403);

        $currentHost = config('global.api_current_host');
        $getApi = Http::withToken(Session::get('token'))->get($currentHost."/api/v1/parcel/list");

        $parcelsArr = json_decode($getApi);

        return view('pages.parcel.list', compact('parcelsArr'));
    }

    public function create()
    {
        return view('pages.parcel.create');
    }

    public function store(Request $request)
    {
        if(!Session::has('token'))
            return abort(403);

        $request->validate([
            'name' => 'required',
    		'pickup' => 'required',
    		'dropoff' => 'required',
    	],[
    		'name.required' => 'This field is required',
    		'pickup.required' => 'This field is required',
    		'dropoff.required' => 'This field is required',
    	]);

        $currentHost = config('global.api_current_host');
        $postApi = $currentHost."/api/v1/parcel/store";

        $response = Http::asForm()->withToken(Session::get('token'))->post($postApi, [
            'parcel_name' => $request->name,
            'pickup_address' => $request->pickup,
            'dropoff_address' => $request->dropoff,
        ]);

        $response = json_decode($response);

        $notification = array(
            'message' => 'Saved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('parcel.list')->with($notification);
    }
}


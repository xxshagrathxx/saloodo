@extends('layouts.main')

@section('content')
    {{-- <div class="container mt-12"> --}}
        <a href="{{ route('parcel.create') }}" class="btn btn-success" style="width: 150px"><span style="padding: 0 10px"><i class="fa fa-plus-square-o" aria-hidden="true"></i></span>Add New</a>
        <br><br>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Parcel</th>
                <th scope="col">Pickup Address</th>
                <th scope="col">Dropoff Address</th>
                <th scope="col">Delivery Date</th>
                <th scope="col">Biker</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $sno = 0;
                    // dd($parcelsArr);
                @endphp
                @foreach ($parcelsArr->parcels as $key=>$parcel)
                    <tr>
                        <th scope="row">{{ ++$sno }}</th>
                        <td>{{ $parcel->parcel_name }}</td>
                        <td>{{ $parcel->pickup_address }}</td>
                        <td>{{ $parcel->dropoff_address }}</td>
                        <td>{!! $parcel->delivery_date ?? '<span class="badge badge-warning">No delivery date yet</span>' !!}</td>
                        <td>{!! $parcel->biker->name ?? '<span class="badge badge-success">No biker yet</span>' !!}</td>
                        <td><span class="badge badge-info">{{ $parcel->status }}</span></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    {{-- </div> --}}
@endsection
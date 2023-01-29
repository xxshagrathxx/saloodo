@extends('layouts.main')

@section('content')
    {{-- <div class="container mt-12"> --}}
        {{-- <a href="{{ route('parcel.create') }}" class="btn btn-success" style="width: 150px"><span style="padding: 0 10px"><i class="fa fa-plus-square-o" aria-hidden="true"></i></span>Add New</a> --}}
        <br><br>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Parcel</th>
                <th scope="col">Sender</th>
                <th scope="col">Status</th>
                <th scope="col">Update Status</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $sno = 0;
                @endphp
                @foreach ($ordersArr->orders as $key=>$order)
                    <tr>
                        <th scope="row">{{ ++$sno }}</th>
                        <td>{{ $order->parcel_name }}</td>
                        <td>{{ $order->sender->name }}</td>
                        <td>{{ $order->status }}</td>
                        @if ($order->status != 'Delivered')
                            <td><a href="{{ route('parcel.update.status', $order->id) }}" class="btn btn-success"><i class="fa fa-arrow-circle-up fa-2x" aria-hidden="true"></i>  </a></td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
          </table>
    {{-- </div> --}}
@endsection
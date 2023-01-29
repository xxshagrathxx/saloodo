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
                <th scope="col">Pick Up</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $sno = 0;
                @endphp
                @foreach ($parcelsArr->parcels as $key=>$parcel)
                    <tr>
                        <th scope="row">{{ ++$sno }}</th>
                        <td>{{ $parcel->parcel_name }}</td>
                        <td>{{ $parcel->sender->name }}</td>
                        <td><a href="{{ route('parcel.create', $parcel->id) }}" class="btn btn-success">Pick up</a></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    {{-- </div> --}}
@endsection
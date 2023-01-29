@extends('layouts.main')

@section('content')
    <form action="{{ route('parcel.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label class="form-label" for="name">Parcel Name<span class="is-required"> (*)</span></label>
            <input type="text" name="name" class="form-control" placeholder="Enter Parcel Name" value="{{ old('name') }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="pickup">Pickup Address<span class="is-required"> (*)</span></label>
            <textarea class="form-control" name="pickup" rows="10">{{ old('pickup') }}</textarea>
            @error('pickup')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="dropoff">Dropoff Address<span class="is-required"> (*)</span></label>
            <textarea class="form-control" name="dropoff" rows="10">{{ old('dropoff') }}</textarea>
            @error('dropoff')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href=" {{url()->previous() }}" class="btn btn-dark">Back</a>
        </div>

    </form>
@endsection
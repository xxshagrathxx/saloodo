@extends('layouts.main')

@section('content')
    <form action="{{ route('parcel.update') }}" method="post">
        @csrf

        <input type="hidden" name="parcelId" value="{{ $parcelId }}">

        <div class="form-group">
            <label class="form-label" for="pickup">Pickup Date<span class="is-required"> (*)</span></label>
            <input class="form-control"  type="datetime-local" id="pickup" name="pickup" value="{{ old('pickup') }}">
            @error('pickup')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="delivery">Delivery Date<span class="is-required"> (*)</span></label>
            <input class="form-control"  type="datetime-local" id="delivery" name="delivery" value="{{ old('delivery') }}">
            @error('delivery')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href=" {{url()->previous() }}" class="btn btn-dark">Back</a>
        </div>

    </form>
@endsection
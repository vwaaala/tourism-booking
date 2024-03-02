@extends('layouts.app')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('tourism-booking::tourism_booking.region.fields.name') }}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($regions as $region)
                <td>{{ $region->getRegionByLocale(app()->getLocale())->id }}</td>
                <td>{{ $region->getRegionByLocale(app()->getLocale())->name }}</td>
            @endforeach
        </tr>
        </tbody>
    </table>
@endsection


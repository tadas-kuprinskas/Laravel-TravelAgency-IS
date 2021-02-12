@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">{{ __('messages.details_of_the_trip') }}</div>
    <div class="card-body">
        <h5>{{ __('messages.customer') }}: {{ $customer->name }} {{$customer->surname}}</h5>
        <h5>{{ __('messages.phone') }}: {{ $customer->phone }}</h5>
        <h5>{{ __('messages.email') }}: {{ $customer->email }}</h5>
        <hr>
        <h5>{{ __('messages.country') }}:  {{ $customer->country->title }}</h5>
       
        <table class="table">
            <tr>
                <th class="font-weight-bold">{{ __('messages.town') }}</th>
                <th class="font-weight-bold">{{ __('messages.population') }}</th>
            </tr>
            @foreach ($customer->country->towns as $town)
            <tr>
                <th>{{ $town->title }}</th>
                <th>{{ $town->population }}</th>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection

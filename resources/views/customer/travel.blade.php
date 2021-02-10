@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Details of the trip</div>
    <div class="card-body">
        <h5>Customer: {{ $customer->name }} {{$customer->surname}}</h5>
        <h5>Phone: {{ $customer->phone }}</h5>
        <h5>Email: {{ $customer->email }}</h5>
        <hr>
        <h5>Country:  {{ $customer->country->title }}</h5>
        <h5>Towns: </h5>
        <table class="table">
            <tr>
                <th>Name of the town</th>
                <th>Population</th>
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

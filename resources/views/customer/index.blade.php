@extends('layouts.app')
@section('content')
<div class="card-body">
    <form class="form-inline" action="{{ route('customer.index') }}" method="get">
        <select name="country_id" id="" class="form-control">
            <option value="" selected disabled>Filter clients by country</option>
            @foreach ($countries as $country)
            <option value="{{ $country->id }}" 
                @if($country->id == app('request')->input('country_id')) 
                    selected="selected" 
                @endif>{{ $country->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary mx-2">Filter</button>
        <a class="btn btn-success" href={{ route('customer.index') }}>Show all</a>
    </form>
</div>
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Country</th>
            <th>Actions</th>
        </tr>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->surname }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->country->title }}</td>
            <td>
                <form action={{ route('customer.destroy', $customer->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('customer.edit', $customer->id) }}>Edit</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                    <a href="{{ route('customer.travel', $customer->id) }}" class="btn btn-primary m-1">Trip details</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('customer.create') }}" class="btn btn-success">Add</a>
    </div>
</div>
@endsection

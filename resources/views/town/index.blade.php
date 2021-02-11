@extends('layouts.app')
@section('content')
<div class="card-body">
    <form class="form-inline" action="{{ route('town.index') }}" method="get">
        <select name="country_id" id="" class="form-control">
            <option value="" selected disabled>Filter towns by country</option>
            @foreach ($countries as $country)
            <option value="{{ $country->id }}" 
                @if($country->id == app('request')->input('country_id')) 
                    selected="selected" 
                @endif>{{ $country->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary mx-2">Filter</button>
        <a class="btn btn-secondary" href={{ route('town.index') }}>Show all</a>
    </form>
    <br>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Population</th>
            <th>Country</th>
            <th>Actions</th>
        </tr>
        @foreach ($towns as $town)
        <tr>
            <td>{{ $town->title }}</td>
            <td>{{ $town->population }}</td>
            <td>{{ $town->country->title }}</td>
            <td>
                <form action={{ route('town.destroy', $town->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('town.edit', $town->id) }}>Edit</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('town.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection

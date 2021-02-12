@extends('layouts.app')
@section('content')
<div class="card-body">
    <table class="table">
        <tr>
            <th class="font-weight-bold">{{ __('messages.title') }}</th>
            <th class="font-weight-bold">{{ __('messages.distance') }}</th>
            <th class="font-weight-bold">{{ __('messages.description') }}</th>
            <th class="font-weight-bold">{{ __('messages.actions') }}</th>
        </tr>
        @foreach ($countries as $country)
        <tr>
            <td>{{ $country->title }}</td>
            <td>{{ $country->distance }}</td>
            <td>{!! $country->description !!}</td>
            <td>
                <form action={{ route('country.destroy', $country->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('country.edit', $country->id) }}>{{ __('messages.edit') }}</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="{{ __('messages.delete') }}"/>
                </form>
            </td>

        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('country.create') }}" class="btn btn-success">{{ __('messages.add') }}</a>
    </div>
</div>
@endsection

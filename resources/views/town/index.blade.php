@extends('layouts.app')
@section('content')

    <div class="card-body">

        <form class="form-inline" action="{{ route('town.index') }}" method="get" role="search">

            <select name="country_id" id="" class="form-control">
                <option value="" selected disabled>{{ __('messages.filter_towns_by_country') }}</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" @if ($country->id == app('request')->input('country_id')) selected="selected" @endif>{{ $country->title }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mx-2">{{ __('messages.filter') }}</button>
            <a class="btn btn-secondary" href={{ route('town.index') }}>{{ __('messages.show_all') }}</a>
            
            <div class="ml-auto">

                <span class="input-group-btn mr-3">
                    <button class="btn btn-info" type="submit" title="Search town">
                        <span class="fas fa-search">&#128270;</span>
                    </button>
                </span>

                <input type="text" class="form-control mr-3" name="search" placeholder="{{ __('messages.town') }}" id="search">

                <a href="{{ route('town.index') }}" >
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button" title="Refresh page">
                            <span class="fas fa-sync-alt">&#128472;</span>
                        </button>
                    </span>
                </a>

            </div>

        </form>

        <br>
        <br>

        <table class="table">
            <tr>
                <th>{{ __('messages.title') }}</th>
                <th>{{ __('messages.population') }}</th>
                <th>{{ __('messages.country') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>

            @foreach ($towns as $town)
                <tr>
                    <td>{{ $town->title }}</td>
                    <td>{{ $town->population }}</td>
                    <td>{{ $town->country->title }}</td>
                    <td>
                        <form action={{ route('town.destroy', $town->id) }} method="POST">
                            <a class="btn btn-success"
                                href={{ route('town.edit', $town->id) }}>{{ __('messages.edit') }}</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="{{ __('messages.delete') }}" />
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
        <div>
            <a href="{{ route('town.create') }}" class="btn btn-success">{{ __('messages.add') }}</a>
        </div>
    </div>
@endsection

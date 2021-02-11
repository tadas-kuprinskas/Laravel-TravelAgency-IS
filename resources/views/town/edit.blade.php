@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.change_the_information_about_the_country') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('town.update', $town->id) }}">
                            @csrf @method("PUT")
                            <div class="form-group">
                                <label for="">{{ __('messages.title') }}</label>
                                <input type="text" name="title" class="form-control" value="{{ $town->title }}">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('messages.population') }}</label>
                                <input type="number" name="population" class="form-control"
                                    value="{{ $town->population }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.country') }}</label>
                                <select name="country_id" id="" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @if ($country->id == $town->country_id) selected="selected" @endif>
                                            {{ $country->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

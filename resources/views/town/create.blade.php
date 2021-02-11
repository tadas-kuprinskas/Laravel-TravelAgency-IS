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
                    <div class="card-header">{{ __('messages.create_a_town') }}</div>
                    <div class="card-body">
                        <form action="{{ route('town.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">{{ __('messages.title') }} </label>
                                <input type="text" value="{{ old('text') }}" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('messages.population') }} </label>
                                <input type="number" value="{{ old('number') }}" name="population" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.country') }} </label>
                                <select name="country_id" id="" class="form-control">
                                    <option value="" selected disabled>{{ __('messages.choose_a_country') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->title }}</option>
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

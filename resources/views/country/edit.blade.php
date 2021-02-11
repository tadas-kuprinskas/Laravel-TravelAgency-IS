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
                    <div class="card-header">{{ __('messages.edit_a_country') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('country.update', $country->id) }}">
                            @csrf @method("PUT")
                            <div class="form-group">
                                <label for="">{{ __('messages.title') }}</label>
                                <input type="text" name="title" class="form-control" value="{{ $country->title }}">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('messages.distance') }}</label>
                                <input type="text" name="distance" class="form-control" value="{{ $country->distance }}">
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('messages.description') }}</label>
                                <textarea id="mce" type="text" name="description" rows=10 cols=100
                                    class="form-control">{{ $country->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

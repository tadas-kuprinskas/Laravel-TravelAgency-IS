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
                    <div class="card-header">{{ __('messages.create_a_country') }}</div>
                    <div class="card-body">
                        <form action="{{ route('country.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>{{ __('messages.title') }}</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.distance') }}</label>
                                <input type="number" name="distance" value="{{ old('distance') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.description') }} </label>
                                <textarea id="mce" name="description" value="{{ old('description') }}" rows=10 cols=100 class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

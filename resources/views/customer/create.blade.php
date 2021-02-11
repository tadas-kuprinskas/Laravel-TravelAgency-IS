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
                    <div class="card-header">{{ __('messages.create_a_customer') }}</div>
                    <div class="card-body">
                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>{{ __('messages.name') }} </label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.surname') }} </label>
                                <input type="text" name="surname" value="{{ old('surname') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.email') }}</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.phone') }} </label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.will_travel_to') }}</label>
                                <select name="country_id" id="" class="form-control">
                                    <option value="" selected disabled>{{ __('messages.change_the_country') }}</option>
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

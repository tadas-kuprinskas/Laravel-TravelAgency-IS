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
                    <div class="card-header">Change the info about the customer</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('customer.update', $customer->id) }}">
                            @csrf @method("PUT")
                            <div class="form-group">
                                <label>{{ __('messages.name') }} </label>
                                <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.surname') }} </label>
                                <input type="text" name="surname" class="form-control" value="{{ $customer->surname }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.email') }}: </label>
                                <input type="text" name="email" class="form-control" value="{{ $customer->email }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.phone') }} </label>
                                <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.will_travel_to') }} </label>
                                <select name="country_id" id="" class="form-control">
                                    <option value="" selected disabled>{{ __('messages.change_the_country') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @if ($country->id == $customer->country_id) selected="selected" @endif>
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

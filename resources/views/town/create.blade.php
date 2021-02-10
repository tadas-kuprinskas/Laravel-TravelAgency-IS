@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create a town</div>
               <div class="card-body">
                   <form action="{{ route('town.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                            <label for="">Title </label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Population </label>
                            <input type="number" name="population" class="form-control">
                        </div>
                       <div class="form-group">
                           <label>Country </label>
                           <select name="country_id" id="" class="form-control">
                                <option value="" selected disabled>Choose a country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->title }}</option>
                                @endforeach
                           </select>
                       </div>
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

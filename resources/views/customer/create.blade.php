@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create a customer</div>
               <div class="card-body">
                   <form action="{{ route('customer.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name </label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Surname </label>
                            <input type="text" name="surname" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label>Email: </label>
                            <input type="text" name="email" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label>Phone </label>
                            <input type="text" name="phone" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label>Will travel to</label>
                            <select name="country_id" id="" class="form-control">
                                 <option value="" selected disabled>Change the country</option>
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

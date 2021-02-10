@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create country</div>
               <div class="card-body">
                   <form action="{{ route('country.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label>Title </label>
                           <input type="text" name="title" class="form-control">
                       </div>
                       <div class="form-group">
                           <label>Distance </label>
                           <input type="number" name="distance" class="form-control"> 
                       </div>
                       <div class="form-group">
                           <label>Description </label>
                           <textarea id="mce" name="description" rows=10 cols=100 class="form-control"></textarea>
                       </div>
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

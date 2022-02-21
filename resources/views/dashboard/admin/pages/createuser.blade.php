@extends('dashboard.admin.layouts.default')
@section('content')
<div class="container">

  <div class="row">
    <div class="col-lg-12 text-center mt-4">
      <h2 class="text-danger">Add New Client</h2>
    </div>
  </div>

  <!--start of form-->
  <div class="row">
    <div class="col-lg-12">
     
      <form action="{{ url('admin/add_user') }}" method="POST"  >
        @csrf
        <div class="form-group mt-4">
          <label for="name"> Name:</label>
          <input type="text" class="form-control" placeholder="Enter User name" name="name">    
        </div>

        

        <div class="form-group mt-4">
          <label for="phone_number">Phone number:</label>
          <input type="number" class="form-control" placeholder="Enter User Phone number" name="phone_number">  
        </div>

        <div class="form-group mt-4">
          <label for="email">E-mail:</label>
          <input type="email" class="form-control" placeholder="Enter User E-mail" name="email">  
        </div>

        <div class="form-group mt-4">
          <label for="password">Password:</label>
          <input type="text" class="form-control" placeholder="Enter User Password" name="password">  
        </div>


        <div class="form-group mt-4">
          <div class="col text-center">    
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        
      </form>
    </div>
  </div>
  <!--end of form-->
</div>


@endsection
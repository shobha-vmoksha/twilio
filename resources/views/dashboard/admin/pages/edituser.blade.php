@extends('dashboard.admin.layouts.default')
@section('content')
<div class="container">

  <div class="row">
    <div class="col-lg-12 text-center mt-4">
      <h2 class="text-danger">Edit Client Information</h2>
    </div>
  </div>

  <!--start of form-->
  <div class="row">
    <div class="col-lg-12">
    <form action="{{ url('admin/edited_user',$data->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('POST')
       
        <input type="hidden" name="id" value="{{$data['id']}}">
        <div class="form-group mt-4">
          <label for="name"> Name:</label>
          <input type="text" class="form-control"  value="{{$data['name']}}" placeholder="Enter User name" name="name">    
        </div>

        

        <div class="form-group mt-4">
          <label for="phone_number">Phone number:</label>
          <input type="number" class="form-control"  value="{{$data['phone_number']}}"  placeholder="Enter User Phone number" name="phone_number">  
        </div>

        <div class="form-group mt-4">
          <label for="email">E-mail:</label>
          <input type="email" class="form-control"  value="{{$data['email']}}"  placeholder="Enter User E-mail" name="email">  
        </div>

        <!-- <div class="form-group mt-4">
          <label for="password">Password:</label>
          <input type="text" class="form-control"  value="{{$data['password']}}" placeholder="Enter User Password" name="password">  
        </div> -->


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
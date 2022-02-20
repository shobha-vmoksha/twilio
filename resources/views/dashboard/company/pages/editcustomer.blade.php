@extends('user.layouts.default')   
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
    <form action="{{ url('company/edited_customer',$data->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('POST')
       
        <input type="hidden" name="id" value="{{$data['id']}}">
        <div class="form-group mt-4">
          <label for="name">Customer Name:</label>
          <input type="text" class="form-control"  value="{{$data['name']}}" placeholder="Enter User name" name="name">    
        </div>

        

        <div class="form-group mt-4">
          <label for="phone_number">Customer Phone number:</label>
          <input type="number" class="form-control"  value="{{$data['phone_number']}}"  placeholder="Enter User Phone number" name="phone_number">  
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
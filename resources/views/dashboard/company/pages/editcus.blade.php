@extends('dashboard.company.layouts.default')   
@section('content')

<div class="container">

@if (session('success'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
  <div class="row">
    <div class="col-lg-12 text-center mt-4">
      <h2 class="text-danger">Edit Customer Information</h2>
    </div>
  </div>

  <!--start of form-->
  <div class="row">
    <div class="col-lg-12">
    <form action="{{ url('edited_cus',$data->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('POST')
        <!-- <?PHP
           echo("data[$id]");
        ?> -->
       
        <input type="text" name="id" value="{{$data['id']}}">
        <!-- <div class="form-group mt-4">
          <label for="name">Customer Name:</label>
          <input type="text" class="form-control"  value="{{$data['name']}}" placeholder="Enter User name" name="name">    
        </div> -->

        

        <div class="form-group mt-4">
          <label for="phone_number">Customer Phone number:</label>
          <input type="text" class="form-control"  value="{{$data['phone_number']}}"  placeholder="Enter User Phone number" name="phone_number">  
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
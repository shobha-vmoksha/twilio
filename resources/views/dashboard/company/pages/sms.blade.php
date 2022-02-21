@extends('dashboard.company.layouts.default')
@section('content')
<div class="container">

    <!-- <div class="row">
        <div class="col-lg-12 text-center mt-4">
            <h2 class="text-danger"> View Client Information</h2>
        </div>
    </div> -->

    @if (session('success'))
            <div class="alert alert-success">
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
    <!--start of form-->
    <div class="row">
        <div class="col-lg-12">
        <div class="card mt-3">
                <div class="card-header bg-danger text-white text-center">Send Notification to the Customer</div>
                <div class="card-body">
            <form action="{{ url('company/send_notification',$data->id) }}" method="POST" >
            @csrf
                <input type="hidden" name="id" value="{{$data['id']}}">
                <!-- <?php
                        print_r($data['phone_number']);

                        ?> -->



                <div class="form-group mt-4">
                    <label for="phone_number">Phone number:</label>
                    <input type="text" class="form-control" value="{{$data['phone_number']}}" placeholder="Enter User Phone number" name="phone_number">
                </div>

                <div class="form-group ">
                    <label for="body">Notification</label>
                    <textarea class="form-control" id="body" rows="3" name="body"></textarea>
                </div>
                
                <div class="form-group mt-4">
          <div class="col text-center">    
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
             </form>
                </div>
        </div>
        </div>
        </div>
    </div>
    <!--end of form-->
</div>




@endsection
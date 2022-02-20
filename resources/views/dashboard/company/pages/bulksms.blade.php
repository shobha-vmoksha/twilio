@extends('user.layouts.default')   
@section('content')


      <div class="container">
        <div class="jumbotron mt-5">
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
            <!-- <div class="row">
                <div class="col">
                    <div class="card mt-3">
                        <div class="card-header">
                            Add Phone Number
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/register" >
                                @csrf
                                <div class="form-group">
                                    <label>Enter Phone Number</label>
                                    <input type="tel" class="form-control" name="phone_number" placeholder="Enter Phone Number">
                                </div>
                                <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Register User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
              


                <div class="row">
        <div class="col-lg-12">
        <div class="card mt-3">
                <div class="card-header bg-danger text-white text-center">Send Notification to the Customer's</div>
                <div class="card-body">
            <form action="{{ url('/register') }}" method="POST" >
      
            @csrf
                <div class="form-group mt-4">
                    <label for="phone_number">Phone number:</label>
                    <input type="text" class="form-control" placeholder="Enter User Phone number" name="phone_number">
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
            </div>
        </div>
    </div>

@endsection
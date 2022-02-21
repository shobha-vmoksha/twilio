@extends('user.layouts.default')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header bg-danger text-white text-center">Send Notification to the Customer</div>
                <div class="card-body">
                    <form action="{{ url('company/send_notification') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group mt-3">
                        
                            <label for="name">Enter Customer Name: </label>
                            <input type="text" name="name" class="form-control" value="{{$data['name']}}" required />
                        </div>
                        <div class="form-group mt-3">
                            <label for="phone_number">Enter Customer Phone Number: </label>
                            <input type="number" name="phone_number" class="form-control" value="{{$data['phone_number']}}" required />
                        </div>


                        <div class="form-group mt-3">
                            <label for="body">Notification</label>
                            <textarea class="form-control" rows="3" name="body"></textarea>
                        </div>


                        <div class="form-group mt-4 ">
                            <input type="submit" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
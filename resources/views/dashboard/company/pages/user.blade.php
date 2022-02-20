@extends('user.layouts.default')

@section('content')
<div class="container">


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

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Add Phone Number
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/register_customer">
                                @csrf
                                <div class="form-group mt-3">
                                    <label for="name">Enter Customer Name: </label>
                                    <input type="text" name="name" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Enter Phone Number</label>
                                    <input type="tel" class="form-control" name="phone_number" placeholder="Enter Phone Number">
                                </div>
                                <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Register User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>

    </div>
</div>
@endsection
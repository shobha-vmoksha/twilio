@extends('dashboard.company.layouts.default')
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
            <div class="row">
                <div class="col">
                    <div class="card mt-3">
                        <div class="card-header">
                            Add Phone Number
                        </div>
                        <div class="card-body">
                           
                            <form action="{{ url('company/register') }}" method="POST"  >
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
               
            </div>
        </div>
    </div>
    @endsection

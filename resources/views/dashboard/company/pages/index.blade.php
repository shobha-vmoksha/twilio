@extends('dashboard.company.layouts.default')

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
    <div class="col-md-12">
        <div class="row mt-3">
            <div class="col-md-6"></div>
            <div class="col-md-6">
            <div class="float-right">
                <a href="{{  url('new_cus') }}" class="btn btn-primary">Add New Customer</a>
                <a href="{{  url('bulk_sms') }}" class="btn btn-warning">send bulk message</a>
            </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row mt-3">
                <h4>List of Customer Information</h4>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-hover table-bordered mt-4">
                <thead>
                    <tr class="bg-white">
                        <th>Sl No</th>

                        <th>Phone Number</th>
                        <th>Action</th>
                        <th>send Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>

                        <td>{{$user->phone_number}}</td>
                        <td>
                            <a href="{{  url('edit_cus', $user->id) }}" class="btn btn-secondary">Edit</a>
                            <a href="{{  url('delete_cus', $user->id) }}" class="btn btn-primary">Delete</a>

                            </a>
                        </td>
                        <td>
                        <!-- <a href="{{  url('/view_message', $user->id) }}" class="btn btn-success">View Message</a> -->
                            <a href="{{  url('/send_message', $user->id) }}" class="btn btn-success">Send Message</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
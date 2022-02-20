@extends('user.layouts.default')
   
@section('content')


<div class="container">
  
  <div class="col-md-12">
    <div class="row mt-3">     
        <div class="float-right">
            <a  href="{{  url('/new_customer') }}" class="btn btn-primary"  >Add New Customer</a>
        </div>
        </div>
</div>

    

    <!--table-->
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
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                        <th>send Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customerinfo as $customer)
                    <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone_number}}</td>
                    <td>
                    <a  href="{{  url('company/view_customer', $customer->id) }}" class="btn btn-warning" >View</a>
                    <a  href="{{  url('company/edit_customer', $customer->id) }}" class="btn btn-secondary" >Edit</a>
                    <a  href="{{  url('company/delete_customer', $customer->id) }}" class="btn btn-primary" >Delete</a>
                   
                </a>
                    </td>
                    <td>
                    <a  href="{{  url('company/send_message', $customer->id) }}" class="btn btn-success" >Send Message</a>  
                    </td>
                  
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
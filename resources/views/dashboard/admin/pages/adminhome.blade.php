@extends('admin.layouts.default')

@section('content')
<div class="container">

         
        <div class="float-end mt-3">
            <a  href="{{  url('admin/create_user') }}" class="btn btn-info" >Add New Client</a>
        </div>
       

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row mt-3 ">
                <h4 style="text-align: center;">List of Client Information</h4>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-hover table-bordered mt-4">
                <thead>
                    <tr class="bg-white">
                        <th>Sl No</th>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                        <th>Action</th>
                        <th> Credit Privilege</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alluser as $user)
                    <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->user_id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                    <!-- <a  href="{{  url('admin/view_user', $user->id) }}" class="btn btn-warning" >View</a> -->
                    <a  href="{{  url('admin/edit_user', $user->id) }}" class="btn btn-secondary" >Edit</a>
                    <a  href="{{  url('admin/delete_user', $user->id) }}" class="btn btn-primary" >Delete</a>
                   
                </a>
                    </td>
                    <td>
                   
                    <a href={{"viewuser/".$user['id']}} class="btn btn-secondary">view </a>
                    <a href={{"viewuser/".$user['id']}} class="btn btn-primary">Add </a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
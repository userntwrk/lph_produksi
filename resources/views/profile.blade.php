@extends('layouts.apps')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('dist/img/company_logo.png')}}" alt="User profile picture">
                    </div>
                    
                    <h3 class="profile-username text-center">{{$data->name}}</h3>
                    <p class="text-muted text-center">{{$data->email}}</p>
                    
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>No Reg</b> <a class="float-right">{{$data->no_reg}}</a>
                        </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{$data->email}}</a>
                    </li>            
                    <li class="list-group-item">
                        <b>Created_At</b> <a class="float-right">{{$data->created_at}}</a>
                    </li>            
                    <li class="list-group-item">
                        <b>Updated_At</b> <a class="float-right">{{$data->updated_at}}</a>
                    </li>            
                </ul>
                
                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
        </div>            
    </div>
</div>
</div>
@endsection
@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">Profile</h3>
@endsection
@section('content')
<style type="text/css">
    .headername{
        font-size: 25px;
        color: #000;
    }
    .subheader .role{
        font-size: 20px;
        color: #000;
        margin-bottom: 15px;
    }
    hr{
        margin-top: 5px;
        margin-bottom: 5px;
    }
    .elabel{
        float: left;
        width: 40%;
        font-weight: 600;
        margin: 5px 0;
    }
    .rounded-circle{
        border-radius: 50px;
    }
</style>
<!-- general form elements -->
<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="col-md-3">
            <img class="rounded-circle" width="100%" src="{{ $usersdata->profileimage }}"  alt='Profile'>
        </div>
        <div class="col-md-9">
            <div  class="headerprofile">
                <div class="headername">
                    {{ $usersdata->name }} {{ $usersdata->lastname }}
                </div>
            </div>
            <hr>
            <div class="subheader">
                <div class="role">
                    Role : {{ $roid = $usersdata->roles->first()->display_name }}
                    {{-- Operational manager --}}
                </div>
            </div>
        </div>
        <div class="col-md-9">
                <div class="col-md-6">
                    <div class="elabel">
                        Employee Id : 
                    </div>
                    <div class="eval">
                        {{ $usersdata->id }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="elabel">
                        Email : 
                    </div>
                    <div class="eval">
                        {{ $usersdata->email }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="elabel">
                        Mobile : 
                    </div>
                    <div class="eval">
                        {{ $usersdata->mobile }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="elabel">
                        DOB : 
                    </div>
                    <div class="eval">
                        {{ \App\helpers\CommanHelper::dateformatdmY($usersdata->dob) }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="elabel">
                        Desigation : 
                    </div>
                    <div class="eval">
                        {{ $usersdata->designationrole->name }}
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- /.box -->
@endsection
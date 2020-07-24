@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">Edit Profile</h3>
@endsection
@section('content')
<div class="row">
    <div class="col-xl-3">
        <div class="card profile">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ Auth::user()->profileimage }}" alt="" class="rounded-circle img-thumbnail avatar-xl">
                    <div class="online-circle">
                        <i class="fa fa-circle text-success"></i>
                    </div>                                        
                    <h4 class="mt-3">{{ Auth::user()->name }}</h4>
                    <p class="text-muted font-12">{{ Auth::user()->roles()->first()->name }}</p>
                    <a href="#" class="btn btn-pink btn-round px-5">Follow Me</a>
                    <ul class="list-unstyled list-inline mt-3 text-muted">
                        <li class="list-inline-item font-size-13 mr-3">
                            <b class="text-dark">754</b> Followers
                        </li>
                        <li class="list-inline-item font-size-13">
                            <b class="text-dark">24</b> Following
                        </li>
                    </ul>


                </div>                                    
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Contact</h5>   
                <ul class="list-unstyled mb-0">
                    <li class=""><i class="mdi mdi-phone mr-2 text-success font-size-18"></i> <b> phone </b> : {{ Auth::user()->mobile }}</li>
                    <li class="mt-2"><i class="mdi mdi-email-outline text-success font-size-18 mt-2 mr-2"></i> <b> Email </b> :  {{ Auth::user()->email }}</li>
                    <li class="mt-2"><i class="mdi mdi-map-marker text-success font-size-18 mt-2 mr-2"></i> <b>Location</b> :  {{ Auth::user()->city }}</li>
                </ul>
            </div>
        </div>                                                     
    </div>
    <div class="col-xl-9">

        <div class="">
            <div class="custom-tab tab-profile">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active pb-3 pt-0" data-toggle="tab" href="#editprofile" role="tab"><i class="fab fa-product-hunt mr-2"></i>Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pb-3 pt-0" data-toggle="tab" href="#changepassword" role="tab"><i class="fas fa-suitcase mr-2"></i>Change Password</a>
                    </li>                                       
                    <li class="nav-item">
                        <a class="nav-link pb-3 pt-0" data-toggle="tab" href="#settings" role="tab"><i class="fas fa-cog mr-2"></i>Settings</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content pt-4">
                    <div class="tab-pane active" id="editprofile" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card ">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('admin.user.updateprofile',$usersdata->id) }}"  enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title">{{ __('messages.user.firstname') }}<span class='required'>*</span></label>
                                                            <input type="text" value="{{ $usersdata->name }}" name="name" class="form-control" maxlength="100" placeholder="Enter Name" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title">{{ __('messages.user.lastname') }}<span class='required'>*</span></label>
                                                            <input type="text" value="{{ $usersdata->lastname }}" name="lastname" class="form-control" maxlength="100" placeholder="Enter last Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title">{{ __('messages.vendor.company') }}</label>
                                                            <input type="text" value="{{ $usersdata->company }}" name="company" class="form-control" maxlength="100" placeholder="Enter company">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title">{{ __('messages.user.email') }}<span class='required'>*</span></label>
                                                            <input type="email" value="{{ $usersdata->email }}" name="email" class="form-control" maxlength="100" placeholder="Enter Email" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title">{{ __('messages.user.mobile') }}<span class='required'>*</span></label>
                                                            <input type="text" value="{{ $usersdata->mobile }}" name="mobile" class="form-control onlynumbervalid" maxlength="15" placeholder="Enter Phone" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title">{{ __('messages.user.address') }}<span class='required'>*</span></label>
                                                            <input type="text" value="{{ $usersdata->address }}" name="address" class="form-control" maxlength="200" placeholder="Enter address" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title">{{ __('messages.user.city') }}<span class='required'>*</span></label>
                                                            <input type="text" value="{{ $usersdata->city }}" name="city" class="form-control" maxlength="200" placeholder="Enter City" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title">{{ __('messages.vendor.bio') }}</label>
                                                            <textarea name="bio" class="form-control" maxlength="200" placeholder="Enter Bio">{{ $usersdata->bio }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title">{{ __('messages.user.profile') }}</label>
                                                            <input type="file" name="profileimage" class="form-control" placeholder="Enter Profile image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="submit" value="Submit" class="btn btn-primary">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="changepassword" role="tabpanel"> 
                        <div class="row">                                                
                            <div class="col-xl-12">
                                <div class="card">                                       
                                    <div class="card-body"> 
                                        <form class="sortserach" id="changepassword" action="{{ route('admin.user.changepassword.success') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                              <input type="password" class="form-control" name="oldpassword"  maxlength="100"  placeholder="Old Password">
                                          </div>
                                          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                              <input type="password" class="form-control" name="newpassword"  maxlength="100" placeholder="New Password">
                                          </div>
                                          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                              <input type="password" class="form-control" name="confirmpassword"  maxlength="100" placeholder="Confirm Password">
                                          </div>
                                          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                              <button type="submit" class="btn btn-warning  pull-right">Submit</button>
                                          </div>
                                      </form>
                                  </div>                       
                              </div>
                          </div>                              
                      </div>
                  </div>

                  <div class="tab-pane" id="settings" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    coming soon...
                                </div>                                           
                            </div>
                        </div>
                    </div>                                            
                </div>
            </div>            
        </div>
    </div>
</div>
</div>
@endsection
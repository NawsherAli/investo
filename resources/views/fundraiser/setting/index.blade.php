@extends('fundraiser.layouts.layout')
@section('contents')
<div class="row">
    <div class="col-12">
        <div class=" ">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-flex align-items-center">
                        <div class="text-center text-sm-left ">
                            <div class="avatar avatar-image" style="width: 150px; height:150px">
                                <img src="../assets/images/avatars/fundraiser.png" alt="">
                            </div>
                        </div>
                        <div class="text-center text-sm-left m-v-15 p-l-30">
                            <h2 class="m-b-5 title-responsive">Hello, {{$user->name}}</h2>
                            <p class="text-dark m-b-20">{{$user->role}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class=" d-md-block d-none    col-1" style="border-left:1px solid #219653;"></div>
                        <div class="col-12 d-sm-none" style="border-top:1px solid #219653;"></div>

                        <div class="col">
                            <ul class="list-unstyled m-t-10">
                                <li class="row">
                                    <p class=" col-3 font-weight-semibold text-dark m-b-5">
                                        <!-- <i class="m-r-10 text-primary anticon anticon-mail"></i> -->
                                        <span class="text-primary">Location: </span> 
                                    </p>
                                    <p class="col font-weight-semibold text-black">Northwest Area</p>
                                </li>
                                <li class="row">
                                    <p class=" col-3 font-weight-semibold text-dark m-b-5">
                                        <!-- <i class="m-r-10 text-primary anticon anticon-phone"></i> -->
                                        <span class="text-primary">User ID: </span> 
                                    </p>
                                    <p class="col font-weight-semibold text-black"> 432</p>
                                </li>
                                <li class="row">
                                    <p class="col-3 font-weight-semibold text-dark m-b-5">
                                        <!-- <i class="m-r-10 text-primary anticon anticon-compass"></i> -->
                                        <span class="text-primary">Address: </span> 
                                    </p>
                                    <p class="col-9 font-weight-semibold text-black">{{$user->fundraiser->address}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
</div>

<!-- Row 3 -->
<div class="row">
    <div class="col-md-12 d-flex justify-content-between">
        <h3 class="title-with-line information-with-line title-responsive">Information&nbsp;</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-pencil-alt mr-2"></i>Edit</button>
   </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6  ">
        <label for="driver-phone" class="text-primary">Company Name</label>
        <input type="text" class="form-control" id="driver-phone" placeholder="School" name="company_name" value="{{$user->fundraiser->company_name}}">
    </div>
    <div class="form-group col-md-6  ">
        <label for="driver-phone" class="text-primary">Personal Fundraiser Fullname</label>
        <input type="text" class="form-control" id="driver-phone" placeholder="Enter email" name="name" value="{{$user->name}}">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6  ">
        <label for="driver-phone" class="text-primary">Company Email</label>
        <input type="email" class="form-control" id="driver-phone" placeholder="Enter Phone Number" name="email" value="{{$user->email}}">
    </div>
    <div class="form-group col-md-6  ">
        <label for="driver-phone" class="text-primary">Contact Person Name</label>
        <input type="number" class="form-control" id="driver-phone" placeholder="E-Transfer Number" name="contact" value="{{$user->contact}}">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="driver-vehical" class="text-primary">Charity Type</label>
        <select id="driver-vehical" class="form-control" name="driver-vehical">
            <option selected>Select Charity Type</option>
            <option>Abc</option>
            <option>Xyz</option>
        </select>
    </div>
    <div class="form-group col-md-6  ">
        <label for="driver-phone" class="text-primary">Vision/Mission</label>
        <textarea class="form-control " aria-label="With textarea" rows="5">{{$user->fundraiser->vision_mission}} </textarea>
    </div>
</div>
@endsection
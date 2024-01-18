@extends('admin.layouts.layout')
@section('contents')
<div class="col-12">
        <div class=" ">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-flex align-items-center">
                        <div class="text-center text-sm-left ">
                            <div class="avatar avatar-image" style="width: 150px; height:150px">
                                <img src="{{ asset('storage/' . $driver->driver_picture) }}" alt="">
                            </div>
                        </div>
                        <div class="text-center text-sm-left m-v-15 p-l-30">
                            <h2 class="m-b-5 title-responsive">Hello,{{$driver->driver_name}} </h2>
                            <p class="text-dark m-b-20">{{$driver->driver_email}}</p>
                            <label for="driver_picture" class="btn btn-primary">Upload Profile Picture</label>

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
                                        <span class="text-primary">Contact: </span> 
                                    </p>
                                    <p class="col font-weight-semibold text-black">{{$driver->driver_phone}}</p>
                                </li>
                                <li class="row">
                                    <p class=" col-3 font-weight-semibold text-dark m-b-5">
                                        <!-- <i class="m-r-10 text-primary anticon anticon-phone"></i> -->
                                        <span class="text-primary">Address: </span> 
                                    </p>
                                    <p class="col font-weight-semibold text-black">{{$driver->driver_address}}</p>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <form method="POST" action="{{route('drivers.update', ['id' => $driver->id])}}"  enctype="multipart/form-data">
         @csrf
         @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="driver_name" class="text-primary">Driver Name</label>
                <input type="text" class="form-control" id="driver_name" placeholder="Enter Driver Name" name="driver_name" value="{{$driver->driver_name}}">
            </div>
            <div class="form-group col-md-6">
                <label for="driver_email" class="text-primary">Driver Email</label>
                <input type="email" class="form-control" id="driver_email" placeholder="Enter Driver Email" name="driver_email" value="{{$driver->driver_email}}">
            </div>
        </div>
        <div class="form-row ">
            <div class="form-group col-md-6">
                <label for="driver_address" class="text-primary">Driver Address</label>
                <input type="text" class="form-control" id="driver_address" name="driver_address" placeholder="Enter Driver Address" value="{{$driver->driver_address}}">
            </div>
            <div class="form-group col-md-6">
                <label for="driver_phone" class="text-primary">Driver Phone</label>
                <input type="number" class="form-control" id="driver_phone" placeholder="Enter Driver Phone" name="driver_phone" value="{{$driver->driver_phone}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="driver_vehical" class="text-primary">Driver Vehical</label>
                <select id="driver_vehical" class="form-control" name="driver_vehical">
                    <option selected>Choose...</option>
                    <option {{ 'Van' == $driver->driver_vehical ? 'selected' : '' }} value="Van">Van</option>
                    <option {{ 'Truck' == $driver->driver_vehical ? 'selected' : '' }} value="Truck">Truck</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="vehical-number-plate" class="text-primary">Vehicle Number Plate</label>
                <input type="text" class="form-control" id="vehical_number_plate" name="vehical_number_plate" placeholder="Enter Vehicle Number Plate " value="{{$driver->vehical_number_plate}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <!-- <label for="driver_picture" class="text-primary">Driver Picture</label> -->
                <input type="file" hidden class="form-control" id="driver_picture" name="driver_picture">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
@extends('admin.layouts.layout')
@section('contents')
<div class="row mb-3" style="border-bottom: 2px solid #219653">
    <div class="col-md-6 order-sm-1 order-1 col-8">
        <h1 class="title-responsive">Create Driver Profile</h1>
    </div>
    
</div>
<!-- <div class="row"> -->
    <form method="POST" action="{{route('drivers.store')}}"  enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="driver_name" class="text-primary">Driver Name</label>
                <input type="text" class="form-control" id="driver_name" placeholder="Enter Driver Name" name="driver_name">
            </div>
            <div class="form-group col-md-6">
                <label for="driver_email" class="text-primary">Driver Email</label>
                <input type="email" class="form-control" id="driver_email" placeholder="Enter Driver Email" name="driver_email">
            </div>
        </div>
        <div class="form-row ">
            <div class="form-group col-md-6">
                <label for="driver_address" class="text-primary">Driver Address</label>
                <input type="text" class="form-control" id="driver_address" name="driver_address" placeholder="Enter Driver Address">
            </div>
            <div class="form-group col-md-6">
                <label for="driver_phone" class="text-primary">Driver Phone</label>
                <input type="number" class="form-control" id="driver_phone" placeholder="Enter Driver Phone" name="driver_phone">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="driver_vehical" class="text-primary">Driver Vehical</label>
                <select id="driver_vehical" class="form-control" name="driver_vehical">
                    <option selected>Choose...</option>
                    <option value="Van">Van</option>
                    <option value="Truck">Truck</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="vehical-number-plate" class="text-primary">Vehicle Number Plate</label>
                <input type="text" class="form-control" id="vehical_number_plate" name="vehical_number_plate" placeholder="Enter Vehicle Number Plate ">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="driver_picture" class="text-primary">Driver Picture</label>
                <input type="file" class="form-control" id="driver_picture" name="driver_picture">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
<!-- </div> -->
@endsection
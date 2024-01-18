@extends('customer.layouts.layout')
@section('contents')
<div class="row mb-3 bg-primary pt-2 br-5 " style="border-bottom: 2px solid #219653">
    <div class="col-md-10 order-sm-1 order-1 col-10">
        <h1 class="text-white title-responsive"><i class="fas fa-arrow-alt-circle-left mr-3"></i>School Charity</h1>
    </div>
</div>

<!-- Row 3 -->
<div class="row">
    <div class="col-md-12">
        <h3 class="title-with-line title-responsive">Select Charity &nbsp;</h3>
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
    <div class="form-group col-md-6">
        <label for="driver-vehical" class="text-primary">Organization Name</label>
        <select id="driver-vehical" class="form-control" name="driver-vehical">
            <option selected>Select Charity Organization</option>
            <option>Abc</option>
            <option>Xyz</option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6  ">
        <label for="driver-phone" class="text-primary">Enter Amount</label>
        <input type="number" class="form-control" id="driver-phone" placeholder="$10.00" name="driver-phone">
    </div>
    <div class="form-group col-md-3 col-6  d-flex align-items-end justify-content-end">
        <button class="btn  border-primary1" style="width: 200px">Cancel</button>
    </div>
    <div class="form-group col-md-3 col-6  d-flex align-items-end justify-content-end">
        <button class="btn  btn-primary"  style="width: 200px">Create</button>
    </div>
</div>
@endsection
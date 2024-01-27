@extends('admin.layouts.layout')
@section('contents')
 <div class="row mb-3" style="border-bottom: 2px solid #219653">
    <div class="col-md-6 order-sm-1 order-1 col-8">
        <h1 class="title-responsive">Edit Plan</h1>
    </div>
    
</div>
<!-- <div class="row"> -->
    <form method="POST" action="{{route('plan.update', ['id' => $plan->id])}}"  enctype="multipart/form-data">
       @csrf
         @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="plan_name" class="text-primary">Name</label>
                <input type="text" class="form-control" id="plan_name" placeholder="Enter Plan Name" name="plan_name" value="{{$plan->name}}">
            </div>
            <div class="form-group col-md-6">
                <label for="plan_minimum" class="text-primary">Minimum</label>
                <input type="number" class="form-control" id="plan_minimum" placeholder="Enter minimum amount" name="plan_minimum" value="{{$plan->manimum}}">
            </div>
        </div>
        <div class="form-row ">
            <div class="form-group col-md-4">
                <label for="plan_maximum" class="text-primary">Maximum</label>
                <input type="number" class="form-control" id="plan_maximum" name="plan_maximum" placeholder="Enter maximum Amount" value="{{$plan->manimum}}">
            </div>
            <div class="form-group col-md-4">
                <label for="plan_for" class="text-primary">For Times</label>
                <input type="number" class="form-control" id="plan_for" placeholder="x times" name="plan_for" value="{{$plan->times}}">
            </div>
            <div class="form-group col-md-4">
                <label for="per_day_earn" class="text-primary">Per Day Earn</label>
                <input type="number" class="form-control" id="per_day_earn" placeholder="x times" name="per_day_earn" value="{{$plan->per_day_earn}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="plan_capital" class="text-primary">Capital Back</label>
                <select id="plan_capital" class="form-control" name="plan_capital">
                    <option selected>Choose...</option>
                    <option {{ 'yes' == $plan->capital_back ? 'selected' : '' }} value="yes">Yes</option>
                    <option {{ 'no' == $plan->capital_backs ? 'selected' : '' }} value="no">No</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="valid_for" class="text-primary">Valid For</label>
                <input type="number" class="form-control" id="valid_for" name="valid_for" placeholder="No of Days" value="{{$plan->valid_for}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="plane_level_1" class="text-primary">Level 1 Percentage</label>
                <input type="number" class="form-control" id="plane_level_1" name="plane_level_1" placeholder=" 5% " value="{{$plan->level_1}}">
            </div>
            <div class="form-group col-md-6">
                <label for="plane_level_2" class="text-primary">Level 2 Percentage</label>
                <input type="number" class="form-control" id="plane_level_2" name="plane_level_2" placeholder=" 10% " value="{{$plan->level_2}}">
            </div>
         </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="plane_level_3" class="text-primary">Level 3Percentage</label>
                <input type="number" class="form-control" id="plane_level_3" name="plane_level_3" placeholder=" 15% " value="{{$plan->level_3}}">
            </div>
            <div class="form-group col-md-6">
                <label for="status" class="text-primary">Status</label>
                <select id="status" class="form-control" name="status">
                    <option selected>Choose...</option>
                    <option {{ 'active' == $plan->status ? 'selected' : '' }} value="active">Active</option>
                    <option {{ 'in-active' == $plan->status ? 'selected' : '' }} value="in-active">In Active</option>
                </select>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
<!-- </div> -->
@endsection
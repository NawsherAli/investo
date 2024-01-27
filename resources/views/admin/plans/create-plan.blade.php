@extends('admin.layouts.layout')
@section('contents')
 <div class="row mb-3" style="border-bottom: 2px solid #219653">
    <div class="col-md-6 order-sm-1 order-1 col-8">
        <h1 class="title-responsive">Create Plan</h1>
    </div>
    
</div>
<!-- <div class="row"> -->
    <form method="POST" action="{{route('plan.store')}}"  enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="plan_name" class="text-primary">Name</label>
                <input type="text" class="form-control" id="plan_name" placeholder="Enter Plan Name" name="plan_name">
            </div>
            <div class="form-group col-md-6">
                <label for="plan_minimum" class="text-primary">Minimum</label>
                <input type="number" class="form-control" id="plan_minimum" placeholder="Enter minimum amount" name="plan_minimum">
            </div>
        </div>
        <div class="form-row ">
            <div class="form-group col-md-4">
                <label for="plan_maximum" class="text-primary">Maximum</label>
                <input type="number" class="form-control" id="plan_maximum" name="plan_maximum" placeholder="Enter maximum Amount">
            </div>
            <div class="form-group col-md-4">
                <label for="plan_for" class="text-primary">For Times</label>
                <input type="number" class="form-control" id="plan_for" placeholder="x times" name="plan_for">
            </div>
            <div class="form-group col-md-4">
                <label for="per_day_earn" class="text-primary">Earn per day </label>
                <input type="number" class="form-control" id="per_day_earn" placeholder="5%" name="per_day_earn">
            </div>
            
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="plan_capital" class="text-primary">Capital Back</label>
                <select id="plan_capital" class="form-control" name="plan_capital">
                    <option selected>Choose...</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="valid_for" class="text-primary">Valid For</label>
                <input type="number" class="form-control" id="valid_for" name="valid_for" placeholder="No of Days">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="plane_level_1" class="text-primary">Level 1 Percentage</label>
                <input type="number" class="form-control" id="plane_level_1" name="plane_level_1" placeholder=" 15% ">
            </div>
            <div class="form-group col-md-4">
                <label for="plane_level_2" class="text-primary">Level 2 Percentage</label>
                <input type="number" class="form-control" id="plane_level_2" name="plane_level_2" placeholder=" 10% ">
            </div>
            <div class="form-group col-md-4">
                <label for="plane_level_3" class="text-primary">Level 3Percentage</label>
                <input type="number" class="form-control" id="plane_level_3" name="plane_level_3" placeholder=" 5% ">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
<!-- </div> -->
@endsection
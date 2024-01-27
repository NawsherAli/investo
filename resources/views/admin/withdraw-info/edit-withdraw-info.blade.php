@extends('admin.layouts.layout')
@section('contents')
 <div class="row mb-3" style="border-bottom: 2px solid #219653">
    <div class="col-md-6 order-sm-1 order-1 col-8">
        <h1 class="title-responsive">Edit Withdraw info</h1>
    </div>
    
</div>
<!-- <div class="row"> -->
    <form method="POST" action="{{route('withdraw-info.update', ['id' => $withdrawinfo->id])}}"  enctype="multipart/form-data">
       @csrf
         @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="minimum_withdraw" class="text-primary">Minnimum Withdraw for Deposit</label>
                <input type="number" class="form-control" id="minimum_withdraw" placeholder="Enter Minimum withdraw for deposit" name="minimum_withdraw" value="{{$withdrawinfo->minimum_withdraw}}">
            </div>
        </div>
        <div class="form-row ">
            <div class="form-group col-md-12">
                <label for="withdraw_commission" class="text-primary">Commission</label>
                <input type="number" class="form-control" id="withdraw_commission" name="withdraw_commission" placeholder="Enter Withdraw commission" value="{{$withdrawinfo->commission}}">
            </div>
            
        </div>
        <div class="form-row ">
            
            <div class="form-group col-md-12">
                <label for="status" class="text-primary">Status</label>
                <select id="status" class="form-control" name="status">
                    <option selected>Choose...</option>
                    <option {{ 'active' == $withdrawinfo->status ? 'selected' : '' }} value="active">Active</option>
                    <option {{ 'in-active' == $withdrawinfo->status ? 'selected' : '' }} value="in-active">In Active</option>
                </select>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
<!-- </div> -->
@endsection
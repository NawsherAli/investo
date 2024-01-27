@extends('admin.layouts.layout')
@section('contents')
 <div class="row mb-3" style="border-bottom: 2px solid #219653">
    <div class="col-md-6 order-sm-1 order-1 col-8">
        <h1 class="title-responsive">Create Withdraw Info</h1>
    </div>
    
</div>
<!-- <div class="row"> -->
    <form method="POST" action="{{route('withdraw-info.store')}}"  enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="minimum_withdraw" class="text-primary">Minnimum Withdraw for Deposit</label>
                <input type="number" class="form-control" id="minimum_withdraw" placeholder="Enter Minimum withdraw for deposit" name="minimum_withdraw">
            </div>
        </div>
        <div class="form-row ">
            <div class="form-group col-md-12">
                <label for="withdraw_commission" class="text-primary">Commission</label>
                <input type="number" class="form-control" id="withdraw_commission" name="withdraw_commission" placeholder="Enter Withdraw commission">
            </div><!-- 
            <div class="form-group col-md-6">
                <label for="task_amount" class="text-primary">Amount</label>
                <input type="number" class="form-control" id="task_amount" placeholder="Task amount" name="task_amount">
            </div> -->
            
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
<!-- </div> -->
@endsection
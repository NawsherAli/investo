@extends('admin.layouts.layout')
@section('contents')

<div class="row mb-3">
    <div class="col-md-6 order-sm-1 order-1 col-6 mt-2" >
        <h1 class="title-responsive">All Plans</h1>
    </div>
    <div class="col-md-6 order-sm-2 order-3 d-flex justify-content-end align-items-center mt-2" >
        <!-- <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <i class="suffix-icon anticon anticon-search"></i>
        </div> -->
        <form id="searchForm" method="GET" action="{{ route('plan.search') }}">
            <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search" name="search">
                <i class="suffix-icon anticon anticon-search" id="searchIcon"></i>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Search</button> -->
        </form>
    </div>
   
</div>
<div class="pb-3 " style="border-top:2px solid #219653;"></div>
<div class="row flex-column  d-block">
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr class="bg-primary">
                    <th scope="col" class="text-white">ID</th>
                    <th scope="col" class="text-white">Name</th>
                    <th scope="col" class="text-white">Minimum</th>
                    <th scope="col" class="text-white">Maximum</th>
                    <th scope="col" class="text-white">For</th>
                    <th scope="col" class="text-white">capital_back</th>
                    <th scope="col" class="text-white">Valid For</th>
                    <th scope="col" class="text-white">Level 1</th>
                    <th scope="col" class="text-white">Level 2</th>
                    <th scope="col" class="text-white">Level 3</th>
                    <th scope="col" class="text-white">Per Day Earn</th>
                    <th scope="col" class="text-white">Status</th>
                    <th scope="col" class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($plans) > 0)
                @foreach($plans as $plan)
                <tr>
                    <th scope="row">{{$plan->id}}</th>
                    <td>{{$plan->name}}</td>
                    <td>{{$plan->manimum}}</td>
                    <td>{{$plan->maximum}}</td>
                    <td>{{$plan->times}}</td>
                    <td>{{$plan->capital_back}}</td>
                    <td>{{$plan->valid_for}}</td>
                    <td>{{$plan->level_1}}</td>
                    <td>{{$plan->level_2}}</td>
                    <td>{{$plan->level_3}}</td>
                    <td>{{$plan->per_day_earn}}</td>
                    @if($plan->status == 'active')
                    <td><b class="badge badge-pill badge-green">{{$plan->status}}</b></td>
                    @else
                   <td><b class="badge badge-pill badge-red">{{$plan->status}}</b></td>
                    @endif
                    <td>
                        <!-- <a href="driver-details.html"><i class="fas fa-edit table-view-icon p-5 badge-success-lighter br-100"></i></a> -->
                        <a href="{{ route('plan.edit', ['id' => $plan->id]) }}" class="badge badge-pill badge-blue"><i class="fas fa-edit    br-100"></i></a>
                        <a href="#" onclick="deletePlan({{ $plan->id }})" class="badge badge-pill badge-red"><i class="fas fa-trash-alt   br-100"></i></a>
                        <!-- <a href="{{ route('view.user', ['id' => $plan->id]) }}" class="badge badge-pill badge-green"><i class="fas fa-external-link-alt    br-100"></i></a> -->
                        <!-- <a href="driver-details.html"><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></a> -->

                        </td>
                </tr>
                @endforeach
                @else
                    <td>No record found</td>
                @endif
            </tbody>
        </table>
    </div>
</div>
<div class="">
    
    {{ $plans->links('vendor.pagination.default') }}
</div>

@if(isset($plan->id))
<form id="delete-form-{{$plan->id}}" action="{{ route('plan.destroy', ['id' => $plan->id]) }}" method="post" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endif
<script>
    function deletePlan(planId) {
        if (confirm('Are you sure you want to delete this Plan Record?')) {
            document.getElementById('delete-form-' + planId).submit();
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the search form and search icon elements
        var searchForm = document.getElementById('searchForm');
        var searchIcon = document.getElementById('searchIcon');

        // Add a click event listener to the search icon
        searchIcon.addEventListener('click', function() {
            // Submit the search form when the search icon is clicked
            searchForm.submit();
        });
    });
</script>  
@endsection
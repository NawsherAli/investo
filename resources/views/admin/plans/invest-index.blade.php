@extends('admin.layouts.layout')
@section('contents')

<div class="row mb-3">
    <div class="col-md-6 order-sm-1 order-1 col-6 mt-2" >
        <h1 class="title-responsive">All Plans Investments</h1>
    </div>
    <div class="col-md-6 order-sm-2 order-3 d-flex justify-content-end align-items-center mt-2" >
        <!-- <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <i class="suffix-icon anticon anticon-search"></i>
        </div> -->
        <!-- <form id="searchForm" method="GET" action="{{ route('plan.search') }}">
            <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search" name="search">
                <i class="suffix-icon anticon anticon-search" id="searchIcon"></i>
            </div> -->
            <!-- <button type="submit" class="btn btn-primary">Search</button> -->
        <!-- </form> -->
    </div>
   
</div>
<div class="pb-3 " style="border-top:2px solid #219653;"></div>
<div class="row flex-column  d-block">
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr class="bg-primary">
                    <th scope="col" class="text-white">ID</th>
                    <th scope="col" class="text-white">Invester Name</th>
                    <th scope="col" class="text-white">Plan</th>
                    <th scope="col" class="text-white">Amount</th>
                    <th scope="col" class="text-white">Earn from Plan</th>
                    <th scope="col" class="text-white">Investment Date</th>
                    <th scope="col" class="text-white">Status</th>
                    <th scope="col" class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($invests) > 0)
                @foreach($invests as $invest)
                <tr>
                    <th scope="row">{{$invest->id}}</th>
                    <td>{{$invest->user->name}}</td>
                    <td>{{$invest->plan->name}}</td>
                    <td>{{$invest->amount}}</td>
                    <td>{{$invest->earn_amount}}</td>
                    <td>{{$invest->invest_date}} </td>
                    @if($invest->status == 'active')
                    <td><b class="badge badge-pill badge-green">{{$invest->status}}</b></td>
                    @else
                   <td><b class="badge badge-pill badge-red">{{$invest->status}}</b></td>
                    @endif
                    <td>
                       
                        <a href="#" onclick="deleteInvest({{ $invest->id }})" class="badge badge-pill badge-red"><i class="fas fa-trash-alt   br-100"></i></a>
                        <a href="{{ route('view.invest', ['id' => $invest->id]) }}" class="badge badge-pill badge-green"><i class="fas fa-external-link-alt    br-100"></i></a>
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
    
    {{ $invests->links('vendor.pagination.default') }}
</div>

@if(isset($invest->id))
<form id="delete-form-{{$invest->id}}" action="{{ route('invest.destroy', ['id' => $invest->id]) }}" method="post" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endif
<script>
    function deleteInvest(planId) {
        if (confirm('Are you sure you want to delete this Investments Record?')) {
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
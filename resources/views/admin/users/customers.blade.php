@extends('admin.layouts.layout')
@section('contents')
<div class="row mb-3" style="border-bottom: 2px solid #219653">
    <div class="col-md-6 order-sm-1 order-1 col-8">
        <h1>Customers</h1>
    </div>
    <div class="col-md-4 order-sm-2 order-3 ">
        <form id="searchForm" method="GET" action="{{ route('customer.search') }}">
            <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search by name" name="search">
                <i class="suffix-icon anticon anticon-search" id="searchIcon"></i>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Search</button> -->
        </form>
    </div>
    <div class="col-md-2 order-sm-3 order-2 col-4 ">
        <div class="dropdown dropdown-animated scale-left">
            <button type="button" class="btn btn-primary" data-toggle="dropdown">
                <i class="fas fa-sliders-h"></i>
            <!-- <img src="assets/icons/filter-icon.png"> -->
            <span>Filter</span>
            </button>
            <div class="dropdown-menu">
                <button class="dropdown-item" type="button">Sort By Latest Customers</button>
                <button class="dropdown-item" type="button">Sort By Latest Donations</button>
                <button class="dropdown-item" type="button">Sort By Latest Pickup</button>
            </div>
        </div>
    </div>
</div>
<div class="row flex-column d-none d-sm-block">
    <div class="table-responsive">
        <table class="table table-sm text-center">
                    <thead>
                        <tr class="bg-primary">
                            <th scope="col" class="text-white">ID</th>
                            <th scope="col" class="text-white">Customer Name</th>
                            <th scope="col" class="text-white">Phone Number</th>
                            <th scope="col" class="text-white">Email</th>
                            <th scope="col" class="text-white">Status</th>
                            <th scope="col" class="text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($customers) > 0)
                        @foreach($customers as $customer)

                        <tr>
                            <th scope="row">{{$customer->id}}</th>
                            <td>{{$customer->name}}</td>
                            <td>+{{$customer->contact}}</td>
                            <td>{{$customer->email}}</td>
                            <td>
                               @if($customer->status == 'active')
                                 <span class="badge badge-pill badge-success mr-3">{{$customer->status}}</span>
                                @endif
                                @if($customer->status == 'in-active')
                                 <span class="badge badge-pill badge-pending mr-3">{{$customer->status}}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('customer.edit', ['id' => $customer->id]) }}" class="badge badge-pill badge-blue"><i class="fas fa-edit    br-100"></i></a>
                                <a href="#" onclick="deleteCustomer({{ $customer->id }})" class="badge badge-pill badge-red"><i class="fas fa-trash-alt   br-100"></i></a>
                                <a href="{{ route('view.customer', ['id' => $customer->id]) }}" class="badge badge-pill badge-green"><i class="fas fa-external-link-alt    br-100"></i></a>
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
    @foreach($customers as $customer)
        <div class="col-12  br-10 border-primary1 pb-2 d-block d-sm-none mb-3">
         <div class="d-flex justify-content-between" >
             <p class="text-black"><b>ID:</b> {{$customer->id}}</p>
             
         </div>
         <div class="d-flex justify-content-between" >
             <h3 class="text-primary">{{$customer->name}}</h3>
         </div>
         <div class="d-flex justify-content-between" >
             <p class="text-black"><i class="m-r-10 text-primary anticon anticon-phone"></i>  +123 456 789</p>
             <p class="text-black"><b>Email:</b>{{$customer->email}}</p>
         </div>
         <div class="d-flex justify-content-end align-items-center" >
            @if($customer->status == 'active')
             <span class="badge badge-pill badge-success mr-3">{{$customer->status}}</span>
            @endif
            @if($customer->status == 'in-active')
             <span class="badge badge-pill badge-pending mr-3">{{$customer->status}}</span>
            @endif
               <a href="{{ route('customer.edit', ['id' => $customer->id]) }}" class="badge badge-pill badge-blue"><i class="fas fa-edit    br-100"></i></a>
               <a href="#" onclick="deleteCustomer({{ $customer->id }})" class="badge badge-pill badge-red"><i class="fas fa-trash-alt   br-100"></i></a>
               <a href="{{ route('view.customer', ['id' => $customer->id]) }}" class="badge badge-pill badge-green"><i class="fas fa-external-link-alt    br-100"></i></a>
         </div>
        </div>
    @endforeach
</div>
{{ $customers->links('vendor.pagination.default') }}

@if(isset($customer->id))
<form id="delete-form-{{ $customer->id }}" action="{{ route('customer.destroy', ['id' => $customer->id]) }}" method="post" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endif
<script>
    function deleteCustomer(customerId) {
        if (confirm('Are you sure you want to delete this Customer Record?')) {
            document.getElementById('delete-form-' + customerId).submit();
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
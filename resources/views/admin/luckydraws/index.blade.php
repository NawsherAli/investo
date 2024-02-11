@extends('admin.layouts.layout')
@section('contents')

<div class="row mb-3">
    <div class="col-md-6 order-sm-1 order-1 col-6 mt-2" >
        <h1 class="title-responsive">Users Luckydraws</h1>
    </div>
    <div class="col-md-6 order-sm-2 order-3 d-flex justify-content-end align-items-center mt-2" >
        <!-- <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <i class="suffix-icon anticon anticon-search"></i>
        </div> -->
        <form id="searchForm" method="GET" action="{{ route('luckydraw.search') }}">
            <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search by participant name" name="search">
                <i class="suffix-icon anticon anticon-search" id="searchIcon"></i>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Search</button> -->
        </form>
    </div>
   
</div>
<div class="pb-3 " style="border-top:2px solid #219653;"></div>
<div class="row flex-column">
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr class="bg-primary">
                    <th scope="col" class="text-white">ID</th>
                    <th scope="col" class="text-white">Name</th>
                    <th scope="col" class="text-white">Easypisan Number</th>
                    <th scope="col" class="text-white">WhatsApp Number</th>
                    <th scope="col" class="text-white">Status</th>
                    <th scope="col" class="text-white">Invest Amount</th>
                    <th scope="col" class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($luckydraws) > 0)
                @foreach($luckydraws as $luckydraw)
                <tr>
                    <th scope="row">{{$luckydraw->id}}</th>
                    <td>{{$luckydraw->name}}</td>
                    <td>{{$luckydraw->easypaisa_number}}</td>
                     <td>{{$luckydraw->whatsapp_number}}</td>
                     <td>{{$luckydraw->invest_amount}}</td>

                    @if($luckydraw->status == 'active')
                    <td><b class="badge badge-pill badge-green">{{$luckydraw->status}}</b></td>
                    @else
                   <td><b class="badge badge-pill badge-red">{{$luckydraw->status}}</b></td>
                    @endif
                    <td>
                        <!-- <a href="{{ route('user.edit', ['id' => $luckydraw->id]) }}" class="badge badge-pill badge-blue"><i class="fas fa-edit    br-100"></i></a> -->
                        <a href="#" onclick="deleteWithdraw({{ $luckydraw->id }})" class="badge badge-pill badge-red"><i class="fas fa-trash-alt   br-100"></i></a>
                        <a href="{{ route('view.luckydraw', ['id' => $luckydraw->id]) }}" class="badge badge-pill badge-green"><i class="fas fa-external-link-alt    br-100"></i></a>
                        <!-- <a href="driver-details.html"><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></a> -->

                        </td>
                </tr>
                @if(isset($luckydraw->id))
                <form id="delete-form-{{$luckydraw->id}}" action="{{ route('luckydraw.destroy', ['id' => $luckydraw->id]) }}" method="post" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                @endif
                
                @endforeach
                @else
                    <td>No record found</td>
                @endif
            </tbody>
        </table>
    </div>
</div>
<div class="">
    
    {{ $luckydraws->links('vendor.pagination.default') }}
</div>
<script>
                    function deleteWithdraw(taskId) {
                    // console.log('Deleting Withdraw with ID:', taskId);
                    if (confirm('Are you sure you want to delete this Withdraw Record?')) {
                        document.getElementById('delete-form-' + taskId).submit();
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
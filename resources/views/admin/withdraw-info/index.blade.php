@extends('admin.layouts.layout')
@section('contents')

<div class="row mb-3">
    <div class="col-md-6 order-sm-1 order-1 col-6 mt-2" >
        <h1 class="title-responsive">Withdraw Info</h1>
    </div>
    <div class="col-md-6 order-sm-2 order-3 d-flex justify-content-end align-items-center mt-2" >
        <!-- <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <i class="suffix-icon anticon anticon-search"></i>
        </div> -->
        <!-- <form id="searchForm" method="GET" action="{{ route('task.search') }}">
            <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search task by title" name="search">
                <i class="suffix-icon anticon anticon-search" id="searchIcon"></i>
            </div> -->
           <!--  <a href="{{route('admin.withdraw.info.create')}}" class="btn btn-primary">Add New</a> -->
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
                    <th scope="col" class="text-white">Minimum withdraw</th>
                    <th scope="col" class="text-white">Commission</th>
                    <!-- <th scope="col" class="text-white">link</th>
                     --><!-- <th scope="col" class="text-white">amount</th> -->
                    <th scope="col" class="text-white">Status</th>
                    <th scope="col" class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($withdrawsinfos) > 0)
                @foreach($withdrawsinfos as $withdrawsinfo)
                <tr>
                    <th scope="row">{{$withdrawsinfo->id}}</th>
                    <td>{{$withdrawsinfo->minimum_withdraw}}</td>
                    <td>{{$withdrawsinfo->commission}}</td>
                    @if($withdrawsinfo->status == 'active')
                    <td><b class="badge badge-pill badge-green">{{$withdrawsinfo->status}}</b></td>
                    @else
                   <td><b class="badge badge-pill badge-red">{{$withdrawsinfo->status}}</b></td>
                    @endif
                    <td>
                        <a href="{{ route('admin.withdraw.info.edit', ['id' => $withdrawsinfo->id]) }}" class="badge badge-pill badge-blue"><i class="fas fa-edit    br-100"></i></a>
                       <!--  <a href="#" onclick="deleteTask({{ $withdrawsinfo->id }})" class="badge badge-pill badge-red"><i class="fas fa-trash-alt   br-100"></i></a>
                        </td> -->
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
     
</div>

@if(isset($withdrawsinfo->id))
<form id="delete-form-{{$withdrawsinfo->id}}" action="{{ route('withdraw-info.destroy', ['id' => $withdrawsinfo->id]) }}" method="post" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endif
<script>
    function deleteTask(taskId) {
        if (confirm('Are you sure you want to delete this Task Record?')) {
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
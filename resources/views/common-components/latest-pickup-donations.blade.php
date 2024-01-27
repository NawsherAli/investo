    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between">
               <ul class="nav nav-tabs" id="myTab" role="tablist" >
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Latest Deposits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Latest Withdraws</a>
                    </li>
                   <!--  <li class="nav-item">
                        <a class="nav-link" id="task-tab" data-toggle="tab" href="#task" role="tab" aria-controls="task" aria-selected="false">Latest Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="plans-tab" data-toggle="tab" href="#plans" role="tab" aria-controls="plans" aria-selected="false">Plans Investments</a>
                    </li> -->
                </ul>
            </div>
               
        <div class="tab-content m-t-15" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
               <div class="table-responsive   d-sm-block">
                    <table class="table table-sm text-center">
            <thead>
                <tr class="bg-primary">
                    <th scope="col" class="text-white">ID</th>
                    <th scope="col" class="text-white">Name</th>
                    <th scope="col" class="text-white">amount</th>
                    <th scope="col" class="text-white">Transaction</th>
                    <th scope="col" class="text-white">Date</th>
                    <th scope="col" class="text-white">Status</th>
                    <th scope="col" class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($deposits) > 0)
                @foreach($deposits as $deposit)
                <tr>
                    <th scope="row">{{$deposit->id}}</th>
                    <td>{{$deposit->user->name}}</td>
                    <td>{{$deposit->amount}}</td>
                    <td>{{$deposit->transaction}}</td>
                    <td>{{$deposit->created_at}}</td>
                    @if($deposit->status == 'pending')
                    <td><b class="badge badge-pill badge-red">{{$deposit->status}}</b></td>
                    @else
                   <td><b class="badge badge-pill badge-green">{{$deposit->status}}</b></td>
                    @endif
                    <td>
                        <!-- <a href="{{ route('user.edit', ['id' => $deposit->id]) }}" class="badge badge-pill badge-blue"><i class="fas fa-edit    br-100"></i></a> -->
                        <a href="#" onclick="deleteDeposit({{ $deposit->id }})" class="badge badge-pill badge-red"><i class="fas fa-trash-alt   br-100"></i></a>
                        <a href="{{ route('view.deposit', ['id' => $deposit->id]) }}" class="badge badge-pill badge-green"><i class="fas fa-external-link-alt    br-100"></i></a>
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
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                 <div class="table-responsive d-none d-sm-block">
                    <table class="table table-sm text-center">
            <thead>
                <tr class="bg-primary">
                    <th scope="col" class="text-white">ID</th>
                    <th scope="col" class="text-white">Name</th>
                    <th scope="col" class="text-white">amount</th>
                    <th scope="col" class="text-white">Date</th>
                    <th scope="col" class="text-white">Status</th>
                    <th scope="col" class="text-white">Send In Days</th>
                    <th scope="col" class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($withdraws) > 0)
                @foreach($withdraws as $withdraw)
                <tr>
                    <th scope="row">{{$withdraw->id}}</th>
                    <td>{{$withdraw->user->name}}</td>
                    <td>{{$withdraw->amount}}</td>
                     <td>{{$withdraw->created_at}}</td>

                    @if($withdraw->status == 'pending')
                    <td><b class="badge badge-pill badge-red">{{$withdraw->status}}</b></td>
                    @else
                   <td><b class="badge badge-pill badge-green">{{$withdraw->status}}</b></td>
                    @endif
                     <td>{{$withdraw->indays}}</td>
                    <td>
                        <!-- <a href="{{ route('user.edit', ['id' => $withdraw->id]) }}" class="badge badge-pill badge-blue"><i class="fas fa-edit    br-100"></i></a> -->
                        <a href="#" onclick="deleteWithdraw({{ $withdraw->id }})" class="badge badge-pill badge-red"><i class="fas fa-trash-alt   br-100"></i></a>
                        <a href="{{ route('view.withdraw', ['id' => $withdraw->id]) }}" class="badge badge-pill badge-green"><i class="fas fa-external-link-alt    br-100"></i></a>
                        <!-- <a href="driver-details.html"><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></a> -->

                        </td>
                </tr>
                @if(isset($withdraw->id))
                <form id="delete-form-{{$withdraw->id}}" action="{{ route('withdraw.destroy', ['id' => $withdraw->id]) }}" method="post" style="display: none;">
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
             <!-- <div class="tab-pane fade" id="task" role="tabpanel" aria-labelledby="task-tab">
                 <div class="table-responsive   d-sm-block">
                    <table class="table table-sm text-center">
                        <thead>
                            <tr class="bg-primary">
                                <th scope="col" class="text-white">ID</th>
                                <th scope="col" class="text-white">Donor Name</th>
                                <th scope="col" class="text-white">Donation Amount</th>
                                <th scope="col" class="text-white">Charity Type</th>
                                <th scope="col" class="text-white">Charity Name</th>
                                <th scope="col" class="text-white">Number of Items Donated</th>
                                <th scope="col" class="text-white">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Tasks</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td><span class="badge badge-pill badge-pending mr-3">Pending</span><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td><span class="badge badge-pill badge-pending mr-3">Pending</span><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td><span class="badge badge-pill badge-pending mr-3">Pending</span><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="plans" role="tabpanel" aria-labelledby="plans-tab">
                 <div class="table-responsive   d-sm-block">
                    <table class="table table-sm text-center">
                        <thead>
                            <tr class="bg-primary">
                                <th scope="col" class="text-white">ID</th>
                                <th scope="col" class="text-white">Donor Name</th>
                                <th scope="col" class="text-white">Donation Amount</th>
                                <th scope="col" class="text-white">Charity Type</th>
                                <th scope="col" class="text-white">Charity Name</th>
                                <th scope="col" class="text-white">Number of Items Donated</th>
                                <th scope="col" class="text-white">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Plans</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td><span class="badge badge-pill badge-pending mr-3">Pending</span><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td><span class="badge badge-pill badge-pending mr-3">Pending</span><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td><span class="badge badge-pill badge-pending mr-3">Pending</span><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> -->
        
        </div>
        
    </div>
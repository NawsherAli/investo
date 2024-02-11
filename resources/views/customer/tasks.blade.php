@extends('customer.layouts.layout')
@section('title')
	Tasks
@endsection
@section('contents')
<link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
<h2 style="color: white; text-align: center;">All Tasks</h2>
<div class="all_plans"  style="z-index: 1">
        <?php 
            foreach($tasks as $task){ ?>
        <div class="plan" style="height: auto" >
            <div class="top-left">{{$task->title}}</div>
            <div class="top-right"> </div>
            <h2 style="color: white">Description</h2>
            <p style="color: white">{{substr($task->description, 0, 98) }}</p>
            <div class="invest_button">
                <div class="cut-out"></div>
        <?php 
            if($user_tasks->isEmpty()){
        ?>
                <div class="button-content"><a href="{{ route('user.do.task', ['id' => $task->id]) }}" style="text-decoration: none; color: white">Do Now</a></div>
        <?php    
            }else{
                $buttonContent = null;
                foreach($user_tasks as $user_task){

                    if($user_task->task_id == $task->id){
                        $buttonContent = '<div class="button-content"><a href="#" style="text-decoration: none; color: white; text-transform:capitalize">'.$user_task->status.'</a></div>';
                                break;
                    }else{
                            $buttonContent = '<div class="button-content"><a href="'. route('user.do.task', ['id' => $task->id]) .'" style="text-decoration: none; color: white;">Do Now</a></div>';
                       }
                    }
                echo $buttonContent;
                }
                
                ?>
                
            </div>
        </div>
        <?php } ?>
        <!-- *********************************************************************************** -->
        <!-- <div class="plan" style="height: 35vh">
            <div class="top-left">Bronze</div>
            <div class="top-right">PKR 200</div>
            <h2 style="color: white">Description</h2>
            <p style="color: white">Just open the task, take a screenshot, and upload the picture here.</p>
            <div class="invest_button">
                <div class="cut-out"></div>
                <div class="button-content">Do Now</div>
            </div>
        </div> -->
        <!-- ************************************************************************************** -->
       <!--  <div class="plan" style="height: 35vh">
            <div class="top-left">Bronze</div>
            <div class="top-right">PKR 200</div>
            <h2 style="color: white">Description</h2>
            <p style="color: white">Just open the task, take a screenshot, and upload the picture here.</p>
            <div class="invest_button">
                <div class="cut-out"></div>
                <div class="button-content">Do Now</div>
            </div>
        </div>
        -->
        <!-- *********************************************************************************************** -->
        <!--  <div class="plan" style="height: 35vh">
            <div class="top-left">Bronze</div>
            <div class="top-right">PKR 200</div>
            <h2 style="color: white">Description</h2>
            <p style="color: white">Just open the task, take a screenshot, and upload the picture here.</p>
            <div class="invest_button">
                <div class="cut-out"></div>
                <div class="button-content">Do Now</div>
            </div>
        </div> -->
        <!-- *************************************************************************************** -->
    </div>
    <div class="footer1" style="z-index: 10">
        <div class="items1">
            <ul>
                <li class="task_icon">
                    <a href="{{route('user.plan.index')}}">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Plans</span>
                    </a>
                </li>
                <li class="active">
                    <a href="{{route('user.tasks.index')}}">
                        <i class="fas fa-tasks"></i>
                        <span>Tasks</span>
                    </a>
                </li>
                <li  >
                    <a href="{{route('investors.dashboard')}}">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.create.deposit')}}">
                        <i class="fas fa-hand-holding-usd deposit-icon"></i>
                        <span>Deposit</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.luckydraw.create')}}">
                        <i class="fas fa-gift"></i>
                        <span>Lucky <span>Draw</span></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.withdraw.create')}}">
                        <i class="fas fa-money-bill-wave withdraw-icon"></i>
                        <span>withdraw</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection('contents')
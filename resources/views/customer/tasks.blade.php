@extends('customer.layouts.layout')
@section('title')
	Investo - Tasks
@endsection
@section('contents')
<h2 style="color: white; text-align: center;">All Tasks</h2>
<div class="all_plans" style=" ">
        <?php 
            foreach($tasks as $task){ ?>
        <div class="plan" style="height: 35vh">
            <div class="top-left">{{$task->title}}</div>
            <div class="top-right"> </div>
            <h2 style="color: white">Description</h2>
            <p style="color: white">{{$task->description}}</p>
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

@endsection('contents')
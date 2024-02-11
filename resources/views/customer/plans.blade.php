<?php  use Carbon\Carbon; ?>
@extends('customer.layouts.layout')
@section('title')
	Plans
@endsection
@section('contents')
<link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
<div class="all_plans">
    <?php foreach($plans as $plan){?>
        <div class="plan"  >
            <div class="top-left">{{$plan->name}}</div>
            <div class="top-right">{{$plan->per_day_earn}}%</div>
            <p>Every day</p>
            <div class="vertical-items">
                <div class="item">
                    <li>Minimum
                    </li><span>{{$plan->manimum}} PKR </span>
                </div>
                <div class="item">
                    <li>Maximum
                    </li>
                    <span>{{$plan->maximum}} PKR</span>

                </div>
                <div class="item">
                    <li>For</li>
                    <span>{{$plan->times}} Times</span>

                </div>
                <div class="item">
                    <li>Capital Back</li>
                    <span>{{$plan->capital_back}}</span>
                </div>
                <div class="item">
                    <li>Valid For</li>
                    <span>{{$plan->valid_for}} Days</span>
                </div>
            </div>
            <p>Affiliate Bonus</p>
            <div class="third_item">

                <div class="bonus_circle">
                    <div class="circle_content">{{$plan->level_1}}%</div>
                    <p>Level 1</p>
                </div>
                <div class="bonus_circle">
                    <div class="circle_content">{{$plan->level_2}}%</div>
                    <p>Level 2</p>
                </div>
                <div class="bonus_circle">
                    <div class="circle_content">{{$plan->level_3}}%</div>
                    <p>Level 3</p>
                </div>
            </div>
            <div class="invest_button">
                <div class="cut-out"></div>
              
                <?php  
                if($user_plans->isEmpty()){?>

                    <div class="button-content"><a href="{{ route('user.invest', ['id' => $plan->id]) }}" style="text-decoration: none; color: white">Invest Now</a></div>
            <?php 
                }else{
                    $buttonContent = null;
                    $plan_date = null;

                    foreach ($user_plans as $user_plan) {
                        if ($user_plan->plan_id == $plan->id && $user_plan->status == 'active') {
                            $plan_date = Carbon::parse($user_plan->invest_date);
                            
                            // Calculate the difference in days
                            $daysDifference = now()->diffInDays($plan_date);
                            $remaing_days = $user_plan->valid_for_days - $daysDifference;
                            $buttonContent = '<div class="button-content"><a href="#" style="text-decoration: none; color: white; text-transform:capitalized">Current Plan (' . $remaing_days. ' Remaning)</a></div>';

                            break;
                        } else {
                            $buttonContent = '<div class="button-content"><a href="' . route('user.invest', ['id' => $plan->id]) . '" style="text-decoration: none; color: white;">Invest Now</a></div>';
                        }
                    }
                         

                        echo $buttonContent;
                }?>
            </div>
        </div>
      <?php   } ?>
</div>      
<div class="footer1" style="z-index: 10">
        <div class="items1">
            <ul>
                <li  class="active">
                    <a href="{{route('user.plan.index')}}">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Plans</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.tasks.index')}}">
                        <i class="fas fa-tasks"></i>
                        <span>Tasks</span>
                    </a>
                </li>
                <li>
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
         <!-- *********************************************************************************** -->
       <!--  <div class="plan">
            <div class="top-left">Silver</div>
            <div class="top-right">1.7%</div>
            <p>Every day</p>
            <div class="vertical-items">
                <div class="item">
                    <li>Minimum
                    </li><span>5000 PKR </span>
                </div>
                <div class="item">
                    <li>Maximum
                    </li>
                    <span>15,000 PKR</span>

                </div>
                <div class="item">
                    <li>For</li>
                    <span>Unlimited</span>

                </div>
                <div class="item">
                    <li>Capital Back</li>
                    <span>Yes</span>
                </div>
                <div class="item">
                    <li>Valid For</li>
                    <span>15 Days</span>
                </div>
            </div>
            <p>Affiliate Bonus</p>
            <div class="third_item">

                <div class="bonus_circle">
                    <div class="circle_content">5%</div>
                    <p>Level 1</p>
                </div>
                <div class="bonus_circle">
                    <div class="circle_content">2%</div>
                    <p>Level 2</p>
                </div>
                <div class="bonus_circle">
                    <div class="circle_content">1%</div>
                    <p>Level 3</p>
                </div>
            </div>
            <div class="invest_button">
                <div class="cut-out"></div>
                <div class="button-content">Invest Now</div>
            </div>
        </div> -->
        <!-- ************************************************************************************** -->
        <!-- <div class="plan">
            <div class="top-left">Gold</div>
            <div class="top-right">1.5%</div>
            <p>Every day</p>
            <div class="vertical-items">
                <div class="item">
                    <li>Minimum
                    </li><span>20000 PKR </span>
                </div>
                <div class="item">
                    <li>Maximum
                    </li>
                    <span>20000 PKR</span>

                </div>
                <div class="item">
                    <li>For</li>
                    <span>2 Times</span>

                </div>
                <div class="item">
                    <li>Capital Back</li>
                    <span>Yes</span>
                </div>
                <div class="item">
                    <li>Valid For</li>
                    <span>30 Days</span>
                </div>
            </div>
            <p>Affiliate Bonus</p>
            <div class="third_item">

                <div class="bonus_circle">
                    <div class="circle_content">5%</div>
                    <p>Level 1</p>
                </div>
                <div class="bonus_circle">
                    <div class="circle_content">2%</div>
                    <p>Level 2</p>
                </div>
                <div class="bonus_circle">
                    <div class="circle_content">1%</div>
                    <p>Level 3</p>
                </div>
            </div>
            <div class="invest_button">
                <div class="cut-out"></div>
                <div class="button-content">Invest Now</div>
            </div>
        </div> -->
       
        <!-- *********************************************************************************************** -->
        <!-- <div class="plan">
            <div class="top-left">Diamond</div>
            <div class="top-right">1 %</div>
            <p>Every day</p>
            <div class="vertical-items">
                <div class="item">
                    <li>Minimum
                    </li><span>25,000 PKR </span>
                </div>
                <div class="item">
                    <li>Maximum
                    </li>
                    <span>30,000 PKR</span>

                </div>
                <div class="item">
                    <li>For</li>
                    <span>unlimited</span>

                </div>
                <div class="item">
                    <li>Capital Back</li>
                    <span>Yes</span>
                </div>
                <div class="item">
                    <li>Valid For</li>
                    <span>45 Days</span>
                </div>
            </div>
            <p>Affiliate Bonus</p>
            <div class="third_item">

                <div class="bonus_circle">
                    <div class="circle_content">5%</div>
                    <p>Level 1</p>
                </div>
                <div class="bonus_circle">
                    <div class="circle_content">2%</div>
                    <p>Level 2</p>
                </div>
                <div class="bonus_circle">
                    <div class="circle_content">1%</div>
                    <p>Level 3</p>
                </div>
            </div>
            <div class="invest_button">
                <div class="cut-out"></div>
                <div class="button-content">Invest Now</div>
            </div>
        </div> -->
        <!-- *************************************************************************************** -->
    </div>
    <!-- <div class="last_plan_section">
        <div class="last_plan">
            <div class="top-left">Platinum</div>
            <div class="top-right">2.2%</div>
            <p>Every day</p>
            <div class="vertical-items">
                <div class="item">
                    <li>Minimum
                    </li><span>35,000 PKR </span>
                </div>
                <div class="item">
                    <li>Maximum
                    </li>
                    <span>100,000 PKR</span>

                </div>
                <div class="item">
                    <li>For</li>
                    <span>Unlimited</span>

                </div>
                <div class="item">
                    <li>Capital Back</li>
                    <span>NO</span>
                </div>
                <div class="item">
                    <li>Valid For</li>
                    <span>90 Days</span>
                </div>
            </div>
            <p>Affiliate Bonus</p>
            <div class="third_item">

                <div class="bonus_circle">
                    <div class="circle_content">5%</div>
                    <p>Level 1</p>
                </div>
                <div class="bonus_circle">
                    <div class="circle_content">2%</div>
                    <p>Level 2</p>
                </div>
                <div class="bonus_circle">
                    <div class="circle_content">1%</div>
                    <p>Level 3</p>
                </div>
            </div>
            <div class="invest_button">
                <div class="cut-out"></div>
                <div class="button-content">Invest Now</div>
            </div>
        </div>
    </div> -->

@endsection('contents')
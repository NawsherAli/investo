<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invest;
use App\Models\Plans;
use App\Models\User;
use Carbon\Carbon;
class CheckInvestmentsStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:check-investments-status';
    protected $signature = 'investments:check-status';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $description = 'Check and update the status of investments';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $investments = Invest::where('status', 'active')->get();
       
        dd($investments->all());
        // foreach ($investments as $investment) {
        //     $investDate = Carbon::parse($investment->invest_date);
        //     $validForDays = $investment->valid_for_days;

        //     $daysDifference = now()->diffInDays($investDate);

        //     if ($daysDifference >= $validForDays) {
        //         // Update the status to 'inactive'
                

        //         $plan_invest_amount = $investments->amount;
        //         $per_day_ern_percentage =Plans::find($investments->plan_id);

        //         $total_days_pers = ($investments->valid_for_days * $per_day_ern_percentage->per_day_earn);

        //         $total_earn_amount = ($total_days_pers * $plan_invest_amount) / 100;

        //         $investment->update(['status' => 'in-active','earn_amount'=>$total_earn_amount]);

        //         $user = User::find($investments->user_id);
        //         $user->update([
        //             'total_balance' => ($user->total_balance) + $total_earn_amount,
        //             'current_balance' => ($user->current_balance) + $total_earn_amount,
        //         ]);

        //     }
        // }

        $this->info('Investment status checked and updated successfully.');
    
    }
}

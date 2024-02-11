<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserTask;
use Carbon\Carbon;

class UpdateTaskStatus extends Command
{
    protected $signature = 'task:updateStatus';
    protected $description = 'Update task status from pending to completed after 5 minutes';

    public function handle()
    {
        $tasks = UserTask::where('status', 'pending')
                     ->where('created_at', '<=', Carbon::now()->subMinutes(5))
                     ->get();

        foreach ($tasks as $task) {
            $task->update(['status' => 'completed']);
        }
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Todolist;

class RepeatTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:repeat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Repeating the task';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $today = Carbon::now();
        $tasks = Todolist::whereNotNull('repeat')->whereDate('duedate', $today->format('Y-m-d'))->get();

        foreach ($tasks as $task) {

                $newtask = $task->replicate();
                $newtask->push();

                $newtask->duedate = Carbon::parse($task->duedate)->addDays($task->repeat);
                $newtask->save();

                $task->repeat = null;
                $task->save();
        }

        $this->info('The tasks have been repeated!');

    }
}

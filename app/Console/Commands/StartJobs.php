<?php

namespace App\Console\Commands;

use App\Jobs\SlackHBD;
use Carbon\Carbon;
use Faker\Provider\zh_TW\DateTime;
use Illuminate\Console\Command;

class StartJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jobs:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'starts the jobs for birthday tracking';

    /**
     *
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
        $tomorrow = date("U", strtotime('tomorrow 8 am'));
        $tomorrow = Carbon::createFromTimestampUTC($tomorrow);


        $jobHBD = (new SlackHBD());//->delay($tomorrow);
        dispatch($jobHBD);

    }
}

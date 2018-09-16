<?php

namespace App\Jobs;

use App\Services\BirthdayService;
use App\Services\SlackService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Carbon\Carbon;

class SlackHBD implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * @param BirthdayService $birthdayService
     * @param SlackService $slackService
     */
    public function handle(BirthdayService $birthdayService, SlackService $slackService)
    {

        $birthdays = $birthdayService->getBirtdayByDate(date('Y-m-d',strtotime('today')));

        $slackService->sendBirthday($birthdays);


        $tomorrow = date("U", strtotime('tomorrow 8 am'));
        $tomorrow = Carbon::createFromTimestampUTC($tomorrow);


        $jobHBD = (new SlackHBD())->delay($tomorrow);

        dispatch($jobHBD);
        return true;

    }
}

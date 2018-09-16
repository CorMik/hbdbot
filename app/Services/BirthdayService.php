<?php

namespace App\Services;

use App\Models\Birthday;


/**
 * Created by PhpStorm.
 * User: corym
 * Date: 2017-08-16
 * Time: 10:46 PM
 */
class BirthdayService
{


    public function getBirtdayByDate($date){

        $birthdays = Birthday::where('birthday',$date)->get();
        return $birthdays;
    }

}
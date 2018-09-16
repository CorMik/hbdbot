<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Birthday extends Model
{

    protected $table = 'birthdays';

    protected $fillable = [
        'slack_name',
        'birthday'
    ];
}

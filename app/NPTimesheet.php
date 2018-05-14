<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nptimesheet';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];

}

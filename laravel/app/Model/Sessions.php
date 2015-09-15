<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Sessions extends Model
{



    protected $table = 'sessions'; /* le nom de ma table */

    public $timestamps = false;


    public function cinema()
    {

        return $this->belongsTo('App\Model\Cinema');
    }


}
<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Recommandations extends Model
{



    protected $table = 'recommandations';

    public $timestamps = false;



    public function movies()
    {

        return $this->belongsTo('App\Model\Movies');
    }


    public function cinema()
    {

        return $this->belongsTo('App\Model\Cinema');
    }


}
<?php

namespace App\Model;

use Jenssegers\Mongodb\Model;



class Messages extends Model
{


    protected $connection = 'mongodb';


    protected $collection = 'messages';




}
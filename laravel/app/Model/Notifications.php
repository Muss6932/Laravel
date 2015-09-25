<?php

namespace App\Model;

use Jenssegers\Mongodb\Model;



class Notifications extends Model
{

    /**
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * @var string
     */
    protected $collection = 'notifications';




}
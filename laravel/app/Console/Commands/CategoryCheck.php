<?php

namespace App\Console\Commands;

use App\Model\Categories;
use App\Model\Notifications;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class categoryCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:check '; //{confirm=false}

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All checks in categories and handle notifications';

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
        // Récupère l'argument confirm
//        $confirm = $this->argument('confirm');

        $categories = Categories::all();

//        if ($confirm == "false"){

            // Je demande la confirmation à l'utilisateur
//            if($this->confirm('Do you wish to continue? [y|N]')) {



            $notifications = Notifications::all();
                foreach($notifications as $notif){
                    if ($notif->category){            // Vérifie si la notif a une clé 'category'
                        $notif->delete();
                    }
                }


                // Je supprime les ancienes notifications
                DB::connection('mongodb')->collection('notifications')->delete();
                $cpt = 0;

                if ($categories->count(0)) {

                    foreach ($categories as $category) {

                        if ($category->movies->isEmpty()) {      // isEmpty permet de savoir si mon tableau est vide ou pas

                            $cpt++;

                            $notification = new Notifications();
                            $notification->category = $category->toArray();
                            $notification->message = "La catégorie {$category->title} est vide.";
                            $notification->criticity = "warning";
                            $notification->save();
                        }
                    }
                } else {
                    $this->error('Aucune catégorie');
                }
//            }
//        }


















    }
















}

<?php

namespace App\Console\Commands;

use App\Model\Movies;
use App\Model\Notifications;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MoviesChecked extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movies:checked';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All checks in movies and handle notifications';

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
        $movies = Movies::where('visible', 0)->get();


        // Je supprime les ancienes notifications
        $notifications = Notifications::all();
        foreach($notifications as $notif){
            if ($notif->movie){                // Vérifie si la notif a une clé 'movie'
                $notif->delete();
            }
        }

        if ($movies->count() != 0) {

            foreach ($movies as $movie) {

                    $notification = new Notifications();
                    $notification->movie = $movie->toArray();
                    $notification->message = "Le film {$movie->title} n'est pas visible.";
                    $notification->criticity = "warning";
                    $notification->save();
            }
        } else {
            $this->error('Tout les films sont visibles.');
        }


    }






















}

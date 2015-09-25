<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Méthode de chargement de mes politiques d'autorisation
     *
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);


        // Je détermine une politique d'autorisation sur mon user
        // 'superadmin' est le nom de ma politique de sécurité
        // '$user' est mon utilisateur connecté

        $gate->define('superadmin', function ($user) {

            return $user->super_admin == 1 ? true : false;

            // revient à :
            //     if($user->super_admin == 1){
            //         return true;
            //     } else {
            //         return false;
            //     }
        });

        $gate->define('hasmovie', function ($user, $movie) {

            return $movie->administrators_id == $user->id ;
        });


        $gate->define('hasactor', function ($user, $actor) {

            return $actor->administrators_id == $user->id ;
        });


        $gate->define('date_expired', function ($user) {
            $date = new \DateTime();

            return new \DateTime($user->date_expiration) > $date;
        });


    }
}

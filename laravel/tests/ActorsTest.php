<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActorsTest extends TestCase
{


    public function testIndex()
    {
        $this->visit('/auth/login')
             ->type('encore@net.net','email')
             ->type('azerty','password')
             ->press('Connexion')
             ->followRedirects()
             ->see('Chat')
             ->visit('/admin/actors/index')
             ->see('Liste des acteurs');
    }








}

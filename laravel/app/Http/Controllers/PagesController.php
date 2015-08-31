<?php

namespace App\Http\Controllers;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{

    /**
     * Page 'Contact'
     */
    public function contact(){

        return view('Pages/Contact');
    }

    /**
     * Page 'Mentions Légales'
     */
    public function mention(){

        return view('Pages/mt');
    }

    /**
     * Page 'FAQ'
     */
    public function faq(){

        return view('Pages/faq');
    }
}

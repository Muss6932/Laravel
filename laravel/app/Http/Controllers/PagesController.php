<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{

    /**
     * Page 'Contact'
     */
    public function welcome(){

        return view('Pages/welcome');
    }

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

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        // Récupere de manière sécurisé la valeur de mon input
        // dont le name est 'title
        $title = $request->input('title');
        $language = $request->input('language');
        $bo = $request->input('bo');
        $cover = $request->input('checkbox');

        dump($title);
        dump($language);
        dump($bo);
        dump($cover);

        return view('Pages/search');
    }

}

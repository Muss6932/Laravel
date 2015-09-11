<?php

namespace App\Http\Controllers;
use App\Model\Comments;
use App\Model\Directors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class CommentsController
 * @package App\Http\Controllers
 */
class CommentsController extends Controller
{

    public function getIndex()
    {
        $datas = [
            'comments'      => Comments::all()
        ];

        return view('Comments/index', $datas);
    }



    public function getDelete($id)
    {
        $comment = Comments::find($id);
        $comment->delete();

        Session::flash('success', "Le commentaire a bien été supprimé. ");


        return Redirect::route('comments.index');
    }




    /**
     * @param Request $request
     * @return mixed
     */
    public function getSelect(Request $request)
    {

        $comments = $request->input('selectComments');
        $submit   = $request->input('submit');

        if (count($comments) == 0) {
            Session::flash('warning', "Aucun commentaire sélectionné");

        } else {
            if ($submit == 'supprimer') {
                foreach ($comments as $id) {
                    $comment = Comments::find($id);
                    $comment->delete();
                }
                Session::flash('success', "Les commentaires ont bien été supprimé. ");
            } elseif ($submit == 'activer') {
                foreach ($comments as $id) {
                    $comment = Comments::find($id);
                    $comment->state = 2;

                    $comment->save();
                }
                Session::flash('success', "Les commentaires sélectionnés sont en ligne. ");

            } elseif ($submit == 'encours') {
                foreach ($comments as $id) {
                    $comment = Comments::find($id);
                    $comment->state = 1;

                    $comment->save();
                }
                Session::flash('success', "Les commentaires sont en cours de lecture.");

            } elseif ($submit == 'inactif') {
                foreach ($comments as $id) {
                    $comment = Comments::find($id);
                    $comment->state = 0;

                    $comment->save();
                }
                Session::flash('success', "Les commentaires sont inactifs.");

            }


        }

        return Redirect::route('comments.index');


    }

}

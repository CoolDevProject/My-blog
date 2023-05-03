<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

// permet d'installer la dépendance qui nous permettra de gérer l'authentification
// composer require laravel/ui
//php artisan ui vue --auth créer le répertoire controllers/auth et met en place les pages d'authentification
class MainController extends Controller
{
    public function home(){
        return view('home');
    }
    public function index(){
        $articles = Article::paginate(4);
        return view('articles', [
            'articles' => $articles
        ]);
    }
    public function show(Article $article){
        return view('article', [
            'article' => $article
        ]);
    }
}

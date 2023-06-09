<?php

namespace App\Observers;

use App\Models\Article;
use Cocur\Slugify\Slugify;
use Illuminate\Support\Str;

//Commande permettant de créer un observer relatif à un model
//le flag permet de pointer vers le model de notre choix
//php artisan make:observer ArticleObserver --model=Article
class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        // METHODE POUR SLUGIFIER A L'AIDE DES HELPERS
        $article->slug= Str::slug($article->title, "-");
        $article->save();
        // METHODE POUR SLUGIFIER A L'AIDE DE COCUR/SLUGIFY
        // $instance = new Slugify();
        // $article->slug = $instance->slugify($article->title);
    }

    /**
     * Handle the Article "updated" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        $article->slug= Str::slug($article->title, "-");
        $article->saveQuietly();
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        //
    }

    /**
     * Handle the Article "restored" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function restored(Article $article)
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        //
    }
}

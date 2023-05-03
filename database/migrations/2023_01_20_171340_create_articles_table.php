<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->string('slug')->nullable();
            //ajoute un champ id pour la catégorie unsignedBigInteger empêche les id négatif
            $table->unsignedBigInteger('category_id');
            //déclare category_id comme clef étrangère, indique qu'on fait référence au champ id de la table catégories
            $table->foreign('category_id')->references('id')->on('categories');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}

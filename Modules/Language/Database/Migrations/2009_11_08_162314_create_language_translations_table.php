<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('language.prefix').'_language_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('language_id')->unsigned();

            $table->string('name');
            $table->unsignedInteger('locale_id')->index();
        
            $table->unique(['language_id','locale_id']);
            $table->foreign('language_id')->references('id')->on(config('language.prefix').'_languages')->onDelete('cascade');
            $table->foreign('locale_id')->references('id')->on(config('language.prefix').'_languages')->onDelete('cascade');
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
        Schema::dropIfExists(config('language.prefix').'_language_translations');
    }
}

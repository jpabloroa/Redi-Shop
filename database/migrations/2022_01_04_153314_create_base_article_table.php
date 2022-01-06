<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBaseArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_articles', function (Blueprint $table) {
            //
            $table->id();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('article_id');
            $table->string('article_blob');
            $table->string('specs_json');
            $table->string('sizes_json');
            $table->decimal('price');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            //
            $table->index('article_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('base_articles');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creators', function (Blueprint $table) {
            //
            $table->id();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('username');
            $table->string('phone');
            $table->string('brand_name');
            $table->string('address');
            $table->string('landing_conf_json');
            $table->string('location');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            //
            $table->primary('username');
            $table->index('brand_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creators');
    }
}

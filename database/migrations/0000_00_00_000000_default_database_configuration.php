<?php

use Illuminate\Database\Migrations\Migration;

class DatabaseConfiguration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::raw("
            CREATE USER 'redi-shop-user'@'localhost' IDENTIFIED BY 'vacante_laravel';
            GRANT ALL PRIVILEGES ON laravel.* TO 'redi-shop-user'@'localhost';
            FLUSH PRIVILEGES;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

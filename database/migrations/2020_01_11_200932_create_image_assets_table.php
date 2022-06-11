<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('image_asset', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('header_home')->nullable();
            $table->string('img_contact')->nullable();
            $table->string('logo_footer')->nullable();
            $table->string('logo_menu')->nullable();
            $table->string('favicon')->nullable();
            $table->string('header_career')->nullable();
            $table->string('benefit_career')->nullable();
            $table->string('team_career1')->nullable();
            $table->string('team_career2')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('image_assets');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_submit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('career_id');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->mediumText('summary')->nullable();
            $table->string('resume');
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
        Schema::dropIfExists('career_submits');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('front_text', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('btn_free_sample');
            $table->string('benefit_secondary');
            $table->string('benefit_heading');
            $table->string('free_sample_heading');
            $table->string('free_sample_secondary');
            $table->text('free_sample_desc');
            $table->string('contact_us_heading');
            $table->string('product_heading');
            $table->string('product_secondary');
            $table->string('career_subheading_header');
            $table->string('career_heading_header');
            $table->string('career_btn_job');
            $table->string('career_section_value_subheading');
            $table->string('career_section_value_heading');
            $table->text('career_section_value_description');
            $table->string('career_team_subheading');
            $table->string('career_team_heading');
            $table->string('career_job_subheading');
            $table->string('career_job_heading');
            $table->string('career_resume_subheading');
            $table->string('career_resume_heading');
            $table->string('career_resume_btn');
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
        Schema::connection('mysql2')->dropIfExists('front_texts');
    }
}

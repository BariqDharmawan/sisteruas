<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrontText extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'front_text';
    protected $fillable = [
        'btn_free_sample',
        'benefit_heading',
        'benefit_secondary',
        'free_sample_heading',
        'free_sample_secondary',
        'free_sample_desc',
        'contact_us_heading',
        'product_heading',
        'product_secondary',
        'career_subheading_header',
        'career_heading_header',
        'career_btn_job',
        'career_section_value_subheading',
        'career_section_value_heading',
        'career_section_value_description',
        'career_team_subheading',
        'career_team_heading',
        'career_job_subheading',
        'career_job_heading',
        'career_resume_subheading',
        'career_resume_heading',
        'career_resume_btn'
    ];
}

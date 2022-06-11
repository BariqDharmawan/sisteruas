<?php

use App\Models\FrontText;
use Illuminate\Database\Seeder;

class FrontTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FrontText::create([
            'btn_free_sample' => 'Browse product now',
            'benefit_secondary' => 'Sample',
            'benefit_heading' => 'Take care your product with our benefit',
            'free_sample_heading' => 'Always get free Sample for you',
            'free_sample_secondary' => 'Sample',
            'free_sample_desc' => '<p style="margin-bottom: 30px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictum, libero interdum cursus sollicitudin, ligula nisl hendrerit libero.</p><p>libero interdum cursus sollicitudin, ligula nisl hendrerit libero, a ullamcorper nulla risus efficitur turpis.</p>',
            'contact_us_heading' => 'contact us',
            'product_heading' => 'Our best product to fulfill your need',
            'product_secondary' => 'The Product',
            'career_subheading_header' => 'Opportunities',
            'career_heading_header' => 'Join our Team Small teams, global mission',
            'career_btn_job' => 'Find Jobs',
            'career_section_value_subheading' => 'Our value & benefit',
            'career_section_value_heading' => 'We believe in being fair and Dickson',
            'career_section_value_description' => '<p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictumlibero interdum cursus sollicitudin, ligula nisl hendrerit libero.</p><p>libero interdum cursus sollicitudin, ligula nisl hendrerit libero, a ullamcorper nulla risus efficitur turpis.</p>',
            'career_team_subheading' => 'Great Team',
            'career_team_heading' => 'Work at Dickson Synergy',
            'career_job_subheading' => 'Job Available',
            'career_job_heading' => 'Our Available Roles',
            'career_resume_subheading' => 'Drop a Resume',
            'career_resume_heading' => 'Join Opportunities',
            'career_resume_btn' => 'Drop resume'
        ]);
    }
}

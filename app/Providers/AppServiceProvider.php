<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CompanyProfile;
use App\Models\SocialMedia;
use App\Models\ImageAsset;
use App\Models\CompanyContact;
use App\Models\Keyword;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //sblm migrate:fresh hrs dicomment dulu
        $companyProfile = CompanyProfile::firstOrFail();
        $companySocial = SocialMedia::all();
        $imageAsset = ImageAsset::firstOrFail();
        $companyContact = CompanyContact::firstOrFail();
        View::share([
            'companyProfile' => $companyProfile,
            'companySocial' => $companySocial,
            'imageAsset' => $imageAsset,
            'companyContact' => $companyContact
        ]);
    }
}

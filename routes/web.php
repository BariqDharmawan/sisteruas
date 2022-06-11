<?php

Auth::routes();

Route::name('customer.')->group(function(){
  Route::resource('our-product', 'ProductController');
  Route::resource('career', 'CareerController');
  Route::resource('frequently-ask-question', 'FaqController');
  Route::resource('request-product', 'RequestProductController');
  Route::resource('contact-us', 'CustomerMessageController');
  Route::get('/', 'HomeController@landing')->name('landing');
  Route::get('about-us', 'HomeController@aboutUs')->name('about-us');
  Route::post('career-submit', 'CareerSubmitController')->name('career.submit');
  Route::post('drop-resume', 'ResumeController')->name('resume.store');
});
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
  Route::prefix('company')->name('company.')->group(function(){
    Route::delete('faq-category/delete/{category}', 'FaqController@destroyCategory')->name('faq-category.destroy');
    Route::get('social-media/change', 'SocialMediaController@edit')->name('social-media.edit-data');
    Route::post('social-media/update-social', 'SocialMediaController@update')->name('social-media.update-data');
    Route::get('social-media/destroy', 'SocialMediaController@destroy')->name('social-media.destroy-data');
    Route::resource('social-media', 'SocialMediaController')->except(['index']);
    Route::resource('image-asset', 'ImageAssetController')->only(['store', 'update']);
    Route::resource('profile', 'CompanyProfileController')->except('show');
    Route::resource('contact', 'CompanyContactController');
    Route::resource('client', 'ClientController')->except(['edit', 'update', 'show', 'create']);
    Route::resource('product', 'ProductController');
    Route::resource('faq', 'FaqController');
    Route::resource('career', 'CareerController');
    Route::resource('benefit', 'BenefitSectionController');
    Route::resource('free-sample', 'FreesampleSectionController');
    Route::resource('request-product', 'RequestProductController');
    Route::resource('message-customer', 'CustomerMessageController');
  });
  Route::prefix('meta-page')->name('meta-page.')->group(function(){
    Route::get('main-page', 'MetaPageController@index')->name('main');
    Route::get('career-page', 'MetaPageController@career')->name('career');
    Route::get('product-page', 'MetaPageController@product')->name('product');
    Route::get('about-page', 'MetaPageController@about')->name('about');
    Route::get('faq-page', 'MetaPageController@faq')->name('faq');
    Route::get('contact-us-page', 'MetaPageController@contactUs')->name('contact-us');
    Route::put('update/{id}', 'MetaPageController@updateMeta')->name('update');
    Route::put('update-thumbnail/{id}', 'MetaPageController@updateThumbnail')->name('updateThumbnail');
    Route::resource('keyword', 'KeywordController');
  });
  Route::prefix('page')->name('page.')->group(function(){
    Route::resource('home', 'FrontTextController');
    Route::resource('contact-us', 'FrontTextController');
    Route::resource('career', 'FrontTextController');
    Route::resource('product', 'FrontTextController');
    Route::resource('client', 'FrontTextController');
    Route::resource('career-cms', 'CareerController');
    Route::resource('image-asset', 'ImageAssetController')->only(['store', 'update']);
    Route::resource('product-image', 'ProductImageController');
  });
});

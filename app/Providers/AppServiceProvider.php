<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;

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
        try {
            if (Schema::hasTable('settings')) {
                $settings = Setting::find(1);
                $currency = json_decode(file_get_contents(app_path('Data/currencies.json')), true)[$settings->currency];
                $company_name = ((isset($settings->company_name)) && ($settings->company_name)) != '' ? $settings->company_name : '';

                config(['currency' => $currency]);
                config(['settings' => $settings]);
                config(['company' => $company_name]);

                //$locale = \App::currentLocale();
            
                //if(isset($settings->locale)){

                //}
            }
        } catch (\Exception $e) {
            
        }
        
    }
}

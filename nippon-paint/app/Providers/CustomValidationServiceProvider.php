<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('kana_first', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[ァ-ン0-9].*/u', $value) == 1;
        });

        Validator::extend('kana_following', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[ァ-ン0-9a-zA-Z!#<>:;&~@%+$"\'\*\^\(\)\[\]\|\/\.,_ー-]$/u', $value) == 1;
        });

        Validator::extend('kana_for_search', function ($attribute, $value, $parameters, $validator) {
            return is_null($value) || $value === ''
                || (preg_match('/[ァ-ン0-9a-zA-Z!#<>:;&~@%+$"\'\*\^\(\)\[\]\|\/\.,_ー-]$/u', $value) == 1
                && preg_match('/^[ァ-ン0-9].*/u', $value) == 1);

        });
    }
}

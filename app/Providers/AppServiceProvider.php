<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        $models = [
            'Question',
            'Category',
        ];
        foreach ($models as $key => $model) {
            $this->app->bind(
                'App\\Repositories\\Contracts\\{$model}RepositoryInterface',
                'App\\Repositories\\Eloquents\\{$model}Repository'
            );
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}

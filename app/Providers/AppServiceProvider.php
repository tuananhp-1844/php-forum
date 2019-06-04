<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Resources\Json\Resource;

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
            'User',
            'Tag',
            'Report',
            'Answer',
            'Post',
            'Role',
        ];
        foreach ($models as $key => $model) {
            $this->app->singleton(
                "App\\Repositories\\Contracts\\{$model}RepositoryInterface",
                "App\\Repositories\\Eloquents\\{$model}Repository"
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
        Resource::withoutWrapping();
    }
}

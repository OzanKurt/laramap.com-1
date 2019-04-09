<?php

namespace App\Providers;

use App\Services\Seo\Meta as MetaService;
use Illuminate\Support\ServiceProvider;

class SeoServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MetaService::class);
    }
}

<?php

namespace App\Providers;

use App\Nova\Metrics\NewReplies;
use App\Nova\Metrics\NewUsers;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return $user->is_admin;
        });
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new \GijsG\SystemResources\SystemResources('ram'),
            new \GijsG\SystemResources\SystemResources('cpu'),
            new NewUsers(),
            new NewReplies(),
            new \NicolasBeauvais\NovaAlgoliaCard\NovaAlgoliaCard('users'),
            new \Kreitje\NovaHorizonStats\JobsPastHour,
            new \Kreitje\NovaHorizonStats\FailedJobsPastHour,
            new \Kreitje\NovaHorizonStats\Processes,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new \NathanHeffley\NovaAlgolia\NovaAlgolia,
            new \Vyuldashev\NovaPermission\NovaPermissionTool(),
            new \Spatie\BackupTool\BackupTool(),
            new \Infinety\Filemanager\FilemanagerTool(),
            new \PragmaRX\ArtisanTool\Tool(),
            new \vmitchell85\NovaLinks\Links(),
            new \KABBOUCHI\LogsTool\LogsTool(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

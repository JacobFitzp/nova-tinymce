<?php

namespace Jacobfitzp\NovaTinymce;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Nova::serving(static function (ServingNova $event) {
            Nova::script('nova-tinymce', __DIR__ . '/../dist/js/field.js');
            Nova::style('nova-tinymce', __DIR__ . '/../dist/css/field.css');
        });

        $this->publishes([
            __DIR__ . '/../config/nova-tinymce.php' => config_path('nova-tinymce.php'),
        ], 'nova-tinymce');

        $this->routes();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/nova-tinymce.php', 'nova-tinymce'
        );
    }

    public function routes(): void
    {
        Route::prefix('nova-vendor/jacobfitzp/nova-tinymce')
            ->group(__DIR__ . '/../routes/api.php');
    }
}

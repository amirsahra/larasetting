<?php

namespace Amirsahra\Larasetting;

use Illuminate\Support\ServiceProvider;

class LarasettingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../configs/larasetting.php' => config_path('larasetting.php'),
            __DIR__ . '/../database/migrations' => database_path('migrations')
        ], 'larasetting');
    }

    public function register(): void
    {
        $this->app->bind('Larasetting', Larasetting::class);
        $this->mergeConfigFrom(__DIR__ . '/../configs/larasetting.php', 'larasetting');
        // Load your helper file here
        require_once __DIR__ . '/../helpers/larasettingHelper.php';

    }
}

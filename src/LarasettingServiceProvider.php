<?php

namespace Amirsahra\Larasetting;

use Illuminate\Support\ServiceProvider;

class LarasettingServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/../configs/larasetting.php' => config_path('larasetting.php'),
        ], 'larasetting');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../configs/larasetting.php', 'larasetting');
    }
}

<?php

namespace ReqResLog;

use Illuminate\Support\ServiceProvider;
use ReqResLog\ReqResLogMiddleware;

class ReqResLogServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $vendorConfigPath = __DIR__ . '/../config/req-res-log.php';
        $this->publishes([$vendorConfigPath => config_path('req-res-log.php')]);
        $this->mergeConfigFrom($vendorConfigPath, 'req-res-log');

        $router = $this->app['router'];
        foreach (config('req-res-log.groups') as $group) {
            $router->pushMiddlewareToGroup($group, ReqResLogMiddleware::class);
        }
    }
}

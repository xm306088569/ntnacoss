<?php

namespace Nt\Nacos;

use Illuminate\Support\ServiceProvider;

class NtnacosServiceProvider extends ServiceProvider
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

        $this->publishes([
            __DIR__.'/app/Helpers' => base_path('app/Helpers'),  // 发布视图目录到resources 下
            __DIR__.'/app/Console/Commands' => base_path('app/Console/Commands'),  // 发布视图目录到resources 下
            __DIR__.'/config/nacos_env.php' => config_path('nacos_env.php'), // 发布配置文件到 laravel 的config 下

        ]);
    }

}

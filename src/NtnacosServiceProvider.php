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
        //    __DIR__.'/app/Console/Commands' => base_path('app/Console/Commands'),  // 发布视图目录到resources 下
            __DIR__.'/app/Console/Commands' => base_path('app/Console/Commands'),  // 发布视图目录到resources 下
            __DIR__.'/config/nacosenv.php' => config_path('nacosenv.php'), // 发布配置文件到 laravel 的config 下

        ]);
    }

}

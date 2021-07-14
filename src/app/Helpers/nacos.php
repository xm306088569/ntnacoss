<?php

function env_url(){
    return  dirname(getcwd()).'/config/env.php';
}

//app文件头方法
if (!function_exists('app_nacos')) {
    function app_nacos()
    {
         include  env_url();
        \alibaba\nacos\NacosConfig::setSnapshotPath(dirname(__DIR__) . "/nacos/config");
        (new \Dotenv\Loader([], new \Dotenv\Environment\DotenvFactory(), true))->loadDirect(
            \alibaba\nacos\failover\LocalConfigInfoProcessor::getSnapshot(
                $NACOS_HOST ,
                $NACOS_DATA_ID,
                $NACOS_GROUP,
                "",
            )
        );
        (new \Dotenv\Loader([], new \Dotenv\Environment\DotenvFactory(), true))->loadDirect(
            \alibaba\nacos\Nacos::init(
                $NACOS_HOST,
                $NACOS_ENV,
                $NACOS_DATA_ID,
                $NACOS_GROUP,
                ""
            )->runOnce()
        );

    }
}

//command文件方法
if (!function_exists('command_nacos')) {
    function command_nacos()
    {
        include  env_url();
        (new \Dotenv\Loader([], new \Dotenv\Environment\DotenvFactory(), true))->loadDirect(
            \alibaba\nacos\Nacos::init(
                $NACOS_HOST,
                $NACOS_ENV,
                $NACOS_DATA_ID,
                $NACOS_GROUP,
                ""
            )->listener()
        );

    }
}

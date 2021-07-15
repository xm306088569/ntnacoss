<?php

namespace Nt\Nacos;

class Ntnacos
{



    //app文件头方法

        function app_nacos()
        {
            $env= include dirname(getcwd()).'/config/nacosenv.php';
            \alibaba\nacos\NacosConfig::setSnapshotPath(dirname(__DIR__) . "/nacos/config");
            (new \Dotenv\Loader([], new \Dotenv\Environment\DotenvFactory(), true))->loadDirect(
                \alibaba\nacos\failover\LocalConfigInfoProcessor::getSnapshot(
                    $env['NACOS_HOST'] ,
                    $env['NACOS_DATA_ID'],
                    $env['NACOS_GROUP'],
                    "",
                )
            );
            (new \Dotenv\Loader([], new \Dotenv\Environment\DotenvFactory(), true))->loadDirect(
                \alibaba\nacos\Nacos::init(
                    $env['NACOS_HOST'] ,
                    $env['NACOS_ENV'],
                    $env['NACOS_DATA_ID'],
                    $env['NACOS_GROUP'],
                    ""
                )->runOnce()
            );

        }


    //command文件方法

        function command_nacos()
        {
            $env= include dirname(getcwd()).'/config/nacosenv.php';
            (new \Dotenv\Loader([], new \Dotenv\Environment\DotenvFactory(), true))->loadDirect(
                \alibaba\nacos\Nacos::init(
                    $env['NACOS_HOST'] ,
                    $env['NACOS_ENV'],
                    $env['NACOS_DATA_ID'],
                    $env['NACOS_GROUP'],
                    ""
                )->listener()
            );

        }
        public function getConfig()
        {
            var_dump(config('test'));
        }
}

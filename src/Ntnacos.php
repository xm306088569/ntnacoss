<?php

namespace Nt\Nacos;

class Ntnacos
{

        function app_nacos($env)
        {
        
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
                    $env['USER_NAME'],
                    $env['PASSWORD'],    
                    ""
                )->runOnce()
            );

        }

}

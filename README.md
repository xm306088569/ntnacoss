# ntnacos
南棠数据中心
1.编写env.php 设置几个变量

# nacos配置服务器地址
$NACOS_HOST    = 'http://config.nantang-tech.com';
# dev,test,prod env环境
$NACOS_ENV     = 'test';
# 分组默认DEFAULT_GROUP
$NACOS_GROUP   = 'prod-nt-oversea-env';
# 数据ID, 默认文件名
$NACOS_DATA_ID = 'test-nt-oversea-env';



2. 修改bootstrap/app.php 
在第一行写

include '/Users/ccc/work/php/env.php';

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


3.创建监听命令

php php artisan make:command NacosRefreshConfig

handle 方法中写入：

include '/Users/ccc/work/php/env.php';
        //
        (new \Dotenv\Loader([], new \Dotenv\Environment\DotenvFactory(), true))->loadDirect(
            \alibaba\nacos\Nacos::init(
                $NACOS_HOST,
                $NACOS_ENV,
                $NACOS_DATA_ID,
                $NACOS_GROUP,
                ""
            )->listener()
        );


  4. 项目启动后，注意后台执行 php artisan nacos:listener
  
  
  composer  require guzzlehttp/guzzle v6.5.5
composer require alibaba/nacos

php artisan asset:publish 
第一步
composer require nts/nacos-for-laravel
第二步修改bootstrap/app.php 
第一行加入
use Nt\Nacos\Ntnacos;
(new Ntnacos())->app_nacos();
第三步
php artisan nacos:listener
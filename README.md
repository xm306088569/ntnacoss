# ntnacos
南棠配置中心laravel项目配置0.2

注意
这个需要   guzzlehttp/guzzle v6.5.5    7.0的请先删掉

第二个发布后的配置文件不要同步到git上
将nacosenv.php 写入到gitignore

使用步骤

第1步引入包
composer require nts/nacos-for-laravel

第2步发布资源
 php artisan vendor:publish --provider="Nt\Nacos\NtnacosServiceProvider"

第3步修改bootstrap/app.php 

第一行加入

use Nt\Nacos\Ntnacos;
$env= include dirname(__DIR__).'/config/nacosenv.php';
(new Ntnacos())->app_nacos($env);


第4步
php artisan nacos:listener

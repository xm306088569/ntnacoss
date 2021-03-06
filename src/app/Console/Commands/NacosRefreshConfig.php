<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Nt\Nacos\Ntnacos;
class NacosRefreshConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nacos:listener';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
      //  (new Ntnacos())->command_nacos();

      $env= config('nacosenv');
      (new \Dotenv\Loader([], new \Dotenv\Environment\DotenvFactory(), true))->loadDirect(
             \alibaba\nacos\Nacos::init(
                 $env['NACOS_HOST'] ,
                 $env['NACOS_ENV'],
                 $env['NACOS_DATA_ID'],
                 $env['NACOS_GROUP'],
                 $env['USER_NAME'],
                 $env['PASSWORD'],
                 ""
             )->listener()
         );
    }
}

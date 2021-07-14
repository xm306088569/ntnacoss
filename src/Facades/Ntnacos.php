<?php
    namespace Nt\Nacos\Facades;
    use Illuminate\Support\Facades\Facade;
    class Ntnacos extends Facade
    {
        protected static function getFacadeAccessor()
        {
            return 'ntnacos';
        }
    }

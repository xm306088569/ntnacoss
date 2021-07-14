<?php
    namespace Nt\Nacos\Facades;
    use Illuminate\Support\Facades\Facade;
    class Nacos extends Facade
    {
        protected static function getFacadeAccessor()
        {
            return 'nacos';
        }
    }

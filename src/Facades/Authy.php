<?php
namespace Moiz2050\Authy\Facades;

use Illuminate\Support\Facades\Facade;

class Authy extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'authy';
    }
}
<?php

namespace App\Facade;
use \Illuminate\Support\Facades\Facade;

class TenantsFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'Tenants';
    }
}

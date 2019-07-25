<?php
namespace App\Providers\Scrapper;

use Illuminate\Support\Facades\Facade;

class ScrapperFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'scrapper';
    }
}

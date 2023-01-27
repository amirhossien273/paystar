<?php


namespace App\services\cart\Facades;


use Illuminate\Support\Facades\Facade;

class CartFacades extends Facade {

   protected static function getFacadeAccessor() { 
    
    return 'CartFacades';
 }
}
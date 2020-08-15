<?php

//@lang('lang.header.register')
use App\Model\Translation;

$json = menu('site', '_json');
$menus = json_decode($json, true);

$menuTranslations = Translation::where('table_name', 'menu_items')
                                ->where('locale', 'az')
                                ->get();

foreach ($menus as $menu){

}


return [

    'login' => 'Login',
    'register' => 'Register'

];

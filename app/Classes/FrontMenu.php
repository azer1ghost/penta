<?php
namespace App\Classes;

use Spatie\Menu\Laravel\Facades\Menu;
use Spatie\Menu\Laravel\Link;

class FrontMenu
{
    protected static $menus;
    protected $parentClass = 'menu-item-has-children page_item_has_children';
    protected $activeClass = 'current-menu-item';

    protected function __construct()
    {
        $json = menu('site', '_json');
        self::$menus = json_decode($json, true);
    }

    /*
     ->setActive()                            // in add() function apply to li
     ->setActiveClass($this->$activeClass)    // directly apply to $menuAdd->setActiveClass($this->$activeClass)

         * USAGE *
                     FrontMenu::getLinks()
    */

    protected function generateMenu($array, $submenu = false)
    {
        if ($submenu)
        {
            $menuAdd = Menu::new ()->addClass('sub-menu');
        }
        else
        {
            $menuAdd = Menu::new ()->addClass('menu');;
        }

        foreach ($array as $menu)
        {
            $icon = $menu['icon_class'];
            $text = $menu['title'];

            $is_parent = $menu['children'] ? true : false;
            $icon_text = $icon ? "<i class='$icon'></i> $text" : $text;

            if (!$menu['route'] and !$is_parent)
            {
                $menuAdd->add(Link::toUrl($menu['url'], $icon_text)->setAttribute('target', $menu['target']));
            }
            elseif ($menu['route'] and !$is_parent)
            {
                $menuAdd->add(Link::toRoute($menu['route'], $icon_text, $menu['parameters'])->setAttribute('target', $menu['target'])); // set route WITH parameters

            }
            elseif (!$menu['route'] and $is_parent)
            {
                $menuAdd->submenu(Link::toUrl($menu['url'], $icon_text)->setAttribute('target', $menu['target']) , $this->generateMenu($menu['children'], true)->addParentClass($this->parentClass));
            }
            elseif ($menu['route'] and $is_parent)
            {
                $menuAdd->submenu(Link::toRoute($menu['route'], $icon_text, $menu['parameters'])->setAttribute('target', $menu['target']) , $this->generateMenu($menu['children'], true)->addParentClass($this->parentClass));
            }

        }

        return $menuAdd;
    }

    public static function getLinks()
    {
        return (new FrontMenu)->generateMenu(self::$menus);
    }

}


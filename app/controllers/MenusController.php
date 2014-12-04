<?php

namespace BDHLab\Onwebed\Controllers;
use View;
use Input;
use Redirect;
use BDHLab\Onwebed\Models;

class Menus extends \BaseController {
    public function getIndex () {
        $menus = Models\Menu::all();
        return View::make('bdhlab.onwebed.menus.index')->with('menus', $menus);
    }
    public function getDelete ($id) {
        $menu = Models\Menu::findOrFail($id);
        return View::make('bdhlab.onwebed.menus.delete')->with('menu', $menu);
    }
    public function getAdd () {
        return View::make('bdhlab.onwebed.menus.add');
    }
    public function postAdd () {
        $menu = new \BDHLab\Onwebed\Models\Menu;
        $menu->name = e(Input::get('name'));
        $menu->save();
        return Redirect::to('backend/manage/menus')->with('alert', array('type' => 'success', 'content' => 'Menu added successfully!'));
    }
}
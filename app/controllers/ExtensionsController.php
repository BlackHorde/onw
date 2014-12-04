<?php

namespace BDHLab\Onwebed\Controllers;
use View;
use Input;
use Redirect;
use BDHLab\Onwebed\Models;
use BDHLab\Onwebed\Classes;

class Extensions extends \BaseController {
    public function getIndex () {
        return View::make('bdhlab.onwebed.extensions.index', array('extensions' => Models\Extension::all()));
    }
    public function getAdd () {
        return View::make('bdhlab.onwebed.extensions.add');
    }
    public function postAdd () {
        chdir('../../onwebed/extensions');
        /* File system errors */
        if (!is_dir(Input::get('name')) || !is_writable(Input::get('name'))) {
            return Redirect::to('backend/manage/extensions/add')
                ->with('alert', array('type' => 'danger', 'content' => "Extension's directory wasn't found or isn't writable."));
        }
        chdir(Input::get('name'));
        /* Extension errors */
        if (!is_file('attributes.json')) {
            return Redirect::to('backend/manage/extensions/add')
                ->with('alert', array('type' => 'danger', 'content' => "The extension doesn't have the attributes.json file."));
        }
        $attributes = json_decode(file_get_contents('attributes.json'));
        /* Check if it's already installed */
        if (Models\Extension::whereName($attributes->name)->wherePrefix($attributes->prefix)->get()->count() >= 1){
            return Redirect::to('backend/manage/extensions/add')
                ->with('alert', array('type' => 'danger', 'content' => "The extension is already installed."));
        }
        /* Dealing with file addition */
        chdir('../../');
        foreach ($attributes->paths as $key => $value) {
            foreach ($value as $source => $destination) {
                Classes\File::recursiveCopy('extensions/'.Input::get('name').'/'.$source, $destination);
            }
        }
        /* Dealing with routes */
        if (!is_writable('app/routes.php')) {
            return Redirect::to('backend/manage/extensions/add')
                ->with('alert', array('type' => 'danger', 'content' => "The routes file isn't writable."));
        }
        $routes = fopen('app/routes.php', 'a');
        fwrite($routes, file_get_contents('extensions/'.Input::get('name').'/routes.php'));
        fclose($routes);
        /* Dealing with raw PHP code */
        $raw_code = file_get_contents('extensions/'.Input::get('name').'/index.php');
        eval($raw_code);
        /* Dealing with record entry */
        $extension = new Models\Extension;
        $extension->name = $attributes->name;
        $extension->prefix = $attributes->prefix;
        $extension->save();

        return Redirect::to('backend/manage/extensions/add')->with('alert', array('type' => 'success', 'content' => 'Extension installed successfully.'));
    }
}
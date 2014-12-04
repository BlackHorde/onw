<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

use BDHLab\Onwebed\Controllers;
use BDHLab\Onwebed\Models;

/* BDHLab\Onwebed\Pages */
Route::get('/', function () {
    $page = Models\Page::first();
    $page->pageContent()->first()->cache();
    return View::make('page.index', array(
        'content' => $page->pageContent()->first()->getContentCachedProcessed()
    ));
});
Route::get('page/{id}', function($id) {
    $page = \BDHLab\Onwebed\Models\Page::findOrFail($id);
    $page->pageContent()->first()->cache();
    return View::make('page.index', array(
        'content' => $page->pageContent()->first()->getContentCachedProcessed()
    ));
})->where('id', '[0-9]+');
Route::get('page/{name}', function($name) {
    $page = \BDHLab\Onwebed\Models\Page::whereName($name)->first();
    $page->pageContent()->first()->cache();
    return View::make('page.index', array(
        'content' => $page->pageContent()->first()->getContentCachedProcessed()
    ));
})->where('name', '[A-Za-z0-9_-]+');
Route::controller('backend/manage/pages', '\BDHLab\Onwebed\Controllers\Pages');
/* BDHLab\Onwebed\Pages End */

Route::get('backend', function () {
    return View::make('backend.index');
});
Route::get('backend/manage', function () {
    $management_items = DB::table('backend_management_items')->get();
    return View::make('backend.manage', array('management_items' => $management_items));
});

Route::controller('backend/manage/menus', '\BDHLab\Onwebed\Controllers\Menus');
Route::controller('backend/manage/extensions', '\BDHLab\Onwebed\Controllers\Extensions');
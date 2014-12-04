<?php

namespace BDHLab\Onwebed\Controllers;
use View;
use Input;
use Redirect;
use BDHLab\Onwebed\Models;

class Pages extends \BaseController {
    public function getIndex () {
        $pages = Models\Page::all();
        return View::make('bdhlab.onwebed.pages.index')->with('pages', $pages);
    }
    public function getDelete ($id) {
        $page = Models\Page::findOrFail($id);
        return View::make('bdhlab.onwebed.pages.delete')->with('page', $page);
    }
    public function getEdit ($id) {
        $page = Models\Page::findOrFail($id);
        return View::make('bdhlab.onwebed.pages.edit')->with('page', $page);
    }
    public function postDelete () {
        $page = Models\Page::findorFail(Input::get('id'));
        $page->pageContent()->delete();
        $page->delete();
        return Redirect::to('backend/manage/pages')->with('alert', array('type' => 'success', 'content' => 'Page deleted successfully!'));
    }
    public function getAdd () {
        return View::make('bdhlab.onwebed.pages.add');
    }
    public function postAdd () {
        $pageContent = new Models\PageContent;

        $page = new Models\Page;
        $page->name = e(Input::get('name'));
        $page->save();
        $page->pageContent()->save($pageContent);
        return Redirect::to('backend/manage/pages')->with('alert', array('type' => 'success', 'content' => 'Page added successfully!'));
    }
}
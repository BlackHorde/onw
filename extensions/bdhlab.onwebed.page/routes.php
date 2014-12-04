/* BDHLab.Onwebed.Page */
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
});

Route::controller('backend/manage/pages', '\BDHLab\Onwebed\Controllers\Pages');
/* BDHLab.Onwebed.Page End */
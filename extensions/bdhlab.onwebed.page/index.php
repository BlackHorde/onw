Schema::create('test_pages', function($table){
    $table->increments('id');
    $table->string('name');
    $table->timestamps();
});

Schema::create('test_page_contents', function($table){
    $table->increments('id');
    $table->text('content');
    $table->text('content_cached');
    $table->integer('page_id')->unsigned();
    $table->timestamps();

    $table->foreign('page_id')->references('id')->on('pages');
});
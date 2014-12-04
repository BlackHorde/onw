<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PageContents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page_contents', function($table){
			$table->increments('id');
			$table->text('content');
			$table->text('content_cached');
			$table->integer('page_id')->unsigned();
			$table->timestamps();

			$table->foreign('page_id')->references('id')->on('pages');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('page_contents');
	}

}

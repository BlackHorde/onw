<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenuItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_items', function($table){
			$table->increments('id');
			$table->string('name');
			$table->integer('weight');
			$table->integer('menu_item_id')->unsigned();
			$table->integer('menu_id')->unsigned();
			$table->foreign('menu_id')->references('id')->on('menus');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu_items');
	}

}

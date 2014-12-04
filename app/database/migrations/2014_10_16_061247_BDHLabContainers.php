<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BDHLabContainers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bdhlab_containers', function($table){
			$table->increments('id');
			$table->string('name');
			$table->integer('width');
			$table->text('content');
			$table->text('content_cached');
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
		Schema::drop('bdhlab_containers');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('albums', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100);
			$table->string('description');
			$table->integer('users_id')->unsigned();
			$table->index('users_id');
			$table->integer('categories_id')->unsigned();
			$table->index('categories_id');
			$table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
			$table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('albums');
	}

}

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
			$table->increments('album_id');
			$table->string('name', 100);
			$table->string('description');
			$table->integer('parent_id')->unsigned();
			$table->index('parent_id');
			$table->integer('cate_id')->unsigned();
			$table->index('cate_id');
			$table->foreign('cate_id')->references('cate_id')->on('categories')->onDelete('cascade');
			$table->foreign('parent_id')->references('parent_id')->on('parents')->onDelete('cascade');
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

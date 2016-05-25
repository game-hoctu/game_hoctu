<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('results', function(Blueprint $table)
		{
			// $table->increments('id');
			$table->integer('childs_id')->unsigned();
			$table->index('childs_id');
			$table->foreign('childs_id')->references('id')->on('childs')->onDelete('cascade');
			$table->integer('images_id')->unsigned();
			$table->index('images_id');
			$table->foreign('images_id')->references('id')->on('images')->onDelete('cascade');
			$table->string('word', 30)->nullable();
			$table->string('correct', 30)->nullable();
			$table->string('incorrect', 30)->nullable();
			$table->primary(['childs_id', 'images_id']);
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
		Schema::drop('results');
	}

}

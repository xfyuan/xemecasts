<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXcastsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xcasts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 100)->unique();
			$table->string('author', 50);
			$table->string('poster', 255);
			$table->string('video', 255);
			$table->string('duration', 10);
			$table->string('description', 500);
			$table->string('github', 255);
			$table->text('notes');
			$table->text('rendered_notes');
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
		Schema::drop('xcasts');
	}

}

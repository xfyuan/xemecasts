<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeriesXcastTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('series_xcast', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('series_id')->unsigned()->index();
			$table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
			$table->integer('xcast_id')->unsigned()->index();
			$table->foreign('xcast_id')->references('id')->on('xcasts')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('series_xcast');
	}

}

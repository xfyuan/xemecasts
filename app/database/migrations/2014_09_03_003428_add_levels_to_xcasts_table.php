<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddLevelsToXcastsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('xcasts', function(Blueprint $table)
		{
			$table->integer('levels')->unsigned()->default(0)->after('author');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('xcasts', function(Blueprint $table)
		{
			$table->dropColumn('levels');
		});
	}

}

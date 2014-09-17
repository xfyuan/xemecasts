<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SeriesTableSeeder extends Seeder {

	public function run()
	{
        DB::table('series')->truncate();

		$faker = Faker::create();

		foreach(range(1, 8) as $index)
		{
			Series::create([
                'title' => $faker->sentence,
                'summary' => $faker->text,
                'purpose' => $faker->sentence,
                'duration' => $faker->time,
			]);
		}
	}

}

<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class XcastsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('xcasts')->truncate();

        $faker = Faker::create();

        foreach(range(1, 64) as $index)
        {
            Xcast::create([
                'title' => $faker->sentence,
                'author' => $faker->name,
                'poster' => 'casts/poster/_default.jpg',
                'video' => 'casts/video/_default.mp4',
                'duration' => $faker->time,
                'description' => $faker->text,
                'github' => $faker->url,
                'notes' => $faker->text($maxNbChars = 2000),
                'rendered_notes' => $faker->text($maxNbChars = 2000),
            ]);
        }
	}

}

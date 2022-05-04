<?php

namespace Database\Seeders;

use App\Models\BookType;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->faker = Faker::Create();
        for($x=0; $x<10 ; $x++){
          BookType::create([
            'typename' => $this->faker->name(),
          ]);
        }
    }
}

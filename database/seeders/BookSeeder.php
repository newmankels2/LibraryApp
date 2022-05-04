<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookType;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->faker = Faker::create();
      $book=BookType::all();
      for($x = 1; $x<51;$x++){
        Book::create([
          'name' => $this->faker->name(),
          'Author' => $this->faker->name(),
          'title' => $this->faker->sentence(),
          'Availability' =>rand(0,1),
          // 'book_type_id' => rand(1,3),
        ]);
      }
    }
}

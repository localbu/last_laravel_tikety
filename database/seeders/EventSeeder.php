<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $eventcount = 20,int $ticketcount = 5): void
    {
        //if category empty run CategorySeeder
        if(Category::count()==0){
            $this->call(CategorySeeder::class);
        }

        // insert dat aausing faker
        $faker = Factory::create();

        // memebuat event berdasarkan eventcount
        for($i=0; $i < $eventcount; $i++){
            // create event
            // $category_id=Category::inRandoomOrder()->first()->id;
            
            $event = Event::create([
                'name'=>$faker->sentence(2),
                'slug'=>$faker->sentence(2),
                'headline'=>$faker->sentence(7),
                'description'=>$faker->paragraph(1),
                'start_time'=>$faker->dateTimeBetween('+1month','+6month'),
                'locations'=>$faker->address,
                'durations'=>$faker->numberBetween(1,10),
                'category_id'=>Category::inRandomOrder()->first()->id,
                'type'=>$faker->randomElement(['online','offline']),
                'is_popular'=>$faker->boolean(20),





            ]);
            // membuat tiket berdasarkan tiket count
            for($j = 0; $j<$ticketcount; $j++){
                $event->tickets()->create([
                    'name'=>$faker->sentence(2),
                    'price'=>$faker->numberBetween(10,100),
                    'quantity'=>$faker->numberBetween(10,100),
                    'max-buy'=>$faker->numberBetween(10,100),

                ]);
            }
        }
    }
}

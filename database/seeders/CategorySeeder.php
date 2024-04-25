<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories=[
        [
            'name'=>'startup',
            'icons'=>null
        ],
        [
            'name'=>'movie',
            'icons'=>null
        ],
        [
            'name'=>'drama',
            'icons'=>null
        ],
        [
            'name'=>'book',
            'icons'=>null
        ],
        [
            'name'=>'business',
            'icons'=>null
        ],
        [
            'name'=>'series',
            'icons'=>null
        ],
        [
            'name'=>'game',
            'icons'=>null
        ],
        ];
        foreach ($categories as $c){
            Category::create([
                'name'=>$c['name'],
                'icons'=>$c['icons'],
            ]);
        } 
    }
}

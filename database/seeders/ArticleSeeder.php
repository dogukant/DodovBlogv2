<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for($i=0;$i<4;$i++){
        $title=$faker->sentence(6);
        DB::table('articles')->insert([
            'category_id'=>Category::query()->inRandomOrder()->first()->id,
            'title'=>$title,
            'content'=>$faker->paragraph(6),
            'slug'=>Str::slug($title),
            'image'=>$faker->imageUrl('800', '400', 'cats', true, 'Faker'),
            'created_at'=>Carbon::now(),
            'updated_at'=>$faker->dateTime('now')
            ]);
        }
    }
}

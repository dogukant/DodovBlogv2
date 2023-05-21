<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Genel','Eğlence','Bilişim','Gezi','Günlük Yaşam','Spor'];
            foreach($categories as $category){
                DB::table('categories')->insert([
                    'name'=>$category,
                    'slug'=>Str::slug($category),
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ]);
            }
    }
}

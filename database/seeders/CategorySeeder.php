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
     Category::insert([
         [
            'name'=> 'Các món ăn nhẹ',
            'slug'=> 'Các món ăn nhẹ',
            'status'=> 1,
            'show_at_home'=>1
         ],
         [
            'name'=> 'Các món heo, bò, gà',
            'slug'=> 'Các món heo, bò, gà',
            'status'=> 1,
            'show_at_home'=>1
         ],
         [
            'name'=> 'Các món hải sản',
            'slug'=> 'Các món hải sản',
            'status'=> 1,
            'show_at_home'=>1
         ],
        ]);
    }
}

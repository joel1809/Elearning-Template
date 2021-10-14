<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->icon = '<i class="fas fa-code"></i>';
        $category->name = "Developpemnt Web";
        $category->save();


        $category = new Category();
        $category->icon = '<i class="fas fa-laptop-code"></i>';
        $category->name = "Developpemnt logiciel";
        $category->save();


        $category = new Category();
        $category->icon = '<i class="fas fa-pen-nib"></i>';
        $category->name = "Infrastructure";
        $category->save();


    }
}

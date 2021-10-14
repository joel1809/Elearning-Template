<?php

use App\Course;
use App\Category;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $slugify = new Slugify();


        $course = new Course();
        $course->title = "Les base de symfony 4";
        $course->subtitle = "Aprendre à créer les sites avec symfony 4";
        $course->slug = $slugify->slugify($course->title);
        $course->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in purus finibus, sagittis lectus nec, rhoncus tortor. Duis ac consequat nibh. Aliquam in enim vel quam egestas luctus. Etiam hendrerit lorem sed ex viverra, vel efficitur libero sagittis.";
        $course->price = 19.99;
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->save();

         $course = new Course();
        $course->title = "Créer un site E-commerce avec Wordpress";
        $course->subtitle = "Construire un site E-commerce complet avec wordpress";
        $course->slug = $slugify->slugify($course->title);
        $course->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in purus finibus, sagittis lectus nec, rhoncus tortor. Duis ac consequat nibh. Aliquam in enim vel quam egestas luctus. Etiam hendrerit lorem sed ex viverra, vel efficitur libero sagittis.";
        $course->price = 14.99;
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->save();

         $course = new Course();
        $course->title = "Les base de Laravel 7";
        $course->subtitle = "Créer une plateforme d'enseignement avec Laravel 7";
        $course->slug = $slugify->slugify($course->title);
        $course->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in purus finibus, sagittis lectus nec, rhoncus tortor. Duis ac consequat nibh. Aliquam in enim vel quam egestas luctus. Etiam hendrerit lorem sed ex viverra, vel efficitur libero sagittis.";
        $course->price = 39.99;
        $course->category_id = Category::all()->random(1)->first()->id;
        $course->save();
    }
}

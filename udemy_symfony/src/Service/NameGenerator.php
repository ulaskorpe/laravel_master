<?php
namespace App\Service;

use Faker\Factory;

class NameGenerator{




    public function randomName(){

        $faker = Factory::create();

        // $names = ['ulaş','mert','hakan','ilker'];

         //$index = array_rand($names);
        return $faker->name;
    }

    public function randomEmail(){

        $faker = Factory::create();

        // $names = ['ulaş','mert','hakan','ilker'];

        //$index = array_rand($names);
        return $faker->email;
    }


    public function makeSlug(){

        $faker = Factory::create();

        // $names = ['ulaş','mert','hakan','ilker'];

        //$index = array_rand($names);
       // return  str_replace(" ","-",$faker->sentence($count));
        return $faker->address;
    }
}




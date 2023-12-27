<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\File;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   //    Post::factory(5)->create();

   $json = File::get('database/json/posts.json');
   $posts = collect(json_decode($json));

   $posts->each(function ($post) {
    
       Post::insert([
           "title" => $post->title,
           "slug" => $post->slug,
           "excerpt" => $post->excerpt,
           "description" => $post->description,
           "is_published" => $post->is_published,
           "min_to_read" => $post->min_to_read
       ]);
   });
    }
}

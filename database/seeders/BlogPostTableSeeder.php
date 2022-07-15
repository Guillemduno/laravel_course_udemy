<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use App\Models\User;

class BlogPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all_users = User::all();
        BlogPost::factory(2)->make()->each(function($post) use ($all_users){
            $post->user_id = $all_users->random()->id;
            $post->save();
        });
    }
}

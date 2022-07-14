<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\BlogpostComment;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        $default_user   = User::factory()->myUser()->create();
        $other_users    = User::factory(10)->create();

        // dd(get_class($default_user), get_class($other_users));
        $all_users = $other_users->concat([$default_user]);

        $posts = BlogPost::factory(2)->make()->each(function($post) use ($all_users){
            $post->user_id = $all_users->random()->id;
            $post->save();
        });

        $comments = BlogpostComment::factory(3)->make()->each(function($coment) use ($posts){
            $comment->blog_post_id = $posts->random()->id;
            $comment->save();
        });
   
    }
}

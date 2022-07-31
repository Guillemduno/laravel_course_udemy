<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\BlogPost;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\BlogPost' => 'App\Policies\BlogPostPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('secret', function(User $user){
            return $user->is_admin;
        });

        // Gate::define('update-post', function(User $user, BlogPost $post){
        //     return $user->id === $post->user_id;
        // });
        // Gate::define('delete-post', function(User $user, BlogPost $post){
        //     return $user->id === $post->user_id;
        // });

        // Gate::define('posts.update','App\Policies\BlogPostPolicy@update');
        // Gate::define('posts.delete','App\Policies\BlogPostPolicy@delete');

        //Gate::resource('posts', 'App\Policies\BlogPostPolicy');
        // posts.create, posts.view, posts.update, posts.delete.

        Gate::before(function($user, $ability){
             if($user->is_admin && in_array($ability,['create', 'update', 'delete'])){
                 return true;
            }
        });
    }
}

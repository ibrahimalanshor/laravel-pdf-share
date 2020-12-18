<?php

namespace App\Providers;

use App\Models\User;
use App\Models\File;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\File' => 'App\Policies\FilePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('save', function (User $user, File $file)
        {
            return $user->id !== $file->user_id && $user->savedFile()->where('file_id', $file->id)->count() < 1;
        });
    }
}

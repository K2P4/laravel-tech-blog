<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use LengthException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (is_null(config('filesystems.disks.cloudinary'))) {
            config([
                'filesystems.disks.cloudinary' => [
                    'driver' => 'cloudinary',
                    'url' => env('CLOUDINARY_URL'),
                    'cloud' => env('CLOUDINARY_CLOUD_NAME'),
                    'key' => env('CLOUDINARY_API_KEY'),
                    'secret' => env('CLOUDINARY_API_SECRET'),
                    'secure' => env('CLOUDINARY_SECURE', true),
                    'throw' => false,
                ],
            ]);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Model::unguard();
        Paginator::useBootstrap();

        Gate::define('admin', function (User $user) {
            return $user && $user->is_admin;
        });

        $compiledPath = '/tmp';
        if (is_writable($compiledPath)) {
            config(['view.compiled' => $compiledPath]);
            config(['cache.stores.file.path' => $compiledPath]);
            config(['session.files' => $compiledPath]);
        }
    }
}

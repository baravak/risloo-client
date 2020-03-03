<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    public function boot()
    {
        app('view');
        app('blade.compiler')->directive('sortView', function ($args) {
            $args = explode(',', $args);
            $args[2] = isset($args[2]) ? $args[2] : null;
            return "<?php echo e($args[0]->sortView($args[1], $args[2]))?>";
        });

        app('blade.compiler')->directive('id', function ($model) {
            return "<?php echo \$__env->make('components._id', ['id'=> ($model)->serial], [\Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])])->render(); ?>";
        });
        app('blade.compiler')->directive('mobile', function ($mobile) {
            return "<?php echo \$__env->make('components._mobile', ['mobile'=> App\Mobile::parse($mobile)], [\Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])])->render(); ?>";
        });
        app('blade.compiler')->directive('email', function ($email) {
            return "<?php echo \$__env->make('components._email', ['email'=> $email], [\Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])])->render(); ?>";
        });
        app('blade.compiler')->directive('username', function ($username) {
            return "<?php echo \$__env->make('components._username', ['username'=> $username], [\Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])])->render(); ?>";
        });
    }
}

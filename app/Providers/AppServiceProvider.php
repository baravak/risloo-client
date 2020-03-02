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
    }
}

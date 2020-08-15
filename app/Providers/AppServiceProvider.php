<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Carbon\Carbon::setWeekEndsAt(\Carbon\Carbon::FRIDAY);
        \Carbon\Carbon::setWeekStartsAt(\Carbon\Carbon::SATURDAY);
        Blade::directive('room', function ($room) {
            return "<?php echo \$__env->make('components._room', ['room' => $room])->render(); ?>";
        });
    }
}

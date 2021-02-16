<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use App\View\Components\Link\Show;

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
        Paginator::defaultView('layouts.pagination');

        \Carbon\Carbon::setWeekEndsAt(\Carbon\Carbon::FRIDAY);
        \Carbon\Carbon::setWeekStartsAt(\Carbon\Carbon::SATURDAY);
        Blade::directive('room', function ($room) {
            return "<?php echo \$__env->make('components._room', ['room' => $room])->render(); ?>";
        });
        Blade::component('link-show', Show::class);
    }
}

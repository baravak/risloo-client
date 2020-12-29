<?php

namespace App\Providers;

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
        \App\Relationship::class => \App\Policies\RelationshipPolicy::class,
        \App\Center::class => \App\Policies\CenterPolicy::class,
        \App\CenterUser::class => \App\Policies\CenterUserPolicy::class,
        \App\RelationshipUser::class => \App\Policies\RelationshipUserPolicy::class,
        \App\Assessment::class => \App\Policies\AssessmentPolicy::class,

        \App\Room::class => \App\Policies\RoomPolicy::class,
        \App\RoomUser::class => \App\Policies\RoomUserPolicy::class,

        \App\TherapyCase::class => \App\Policies\CasePolicy::class,
        \App\Session::class => \App\Policies\SessionPolicy::class,
        \App\Sample::class => \App\Policies\SamplePolicy::class,
        \App\Practice::class => \App\Policies\PracticePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::resource('dashboard.relationships', 'App\Policies\RelationshipPolicy');
        Gate::resource('dashboard.assessments', 'App\Policies\AssessmentPolicy');
        Gate::resource('dashboard.relationship.users', 'App\Policies\RelationshipUserPolicy');
        Gate::resource('dashboard.rooms', 'App\Policies\RoomPolicy');
        Gate::define('dashboard.rooms.admin', 'App\Policies\RoomPolicy@admin');
        Gate::resource('dashboard.samples', 'App\Policies\SamplePolicy');
        Gate::define('dashboard.samples.management', 'App\Policies\SamplePolicy@management');

        Gate::resource('dashboard.centers', 'App\Policies\CenterPolicy');
        Gate::define('dashboard.centers.acceptation', 'App\Policies\CenterPolicy@acceptation');
        Gate::resource('dashboard.center.users', 'App\Policies\CenterUserPolicy');

        Gate::resource('dashboard.cases', 'App\Policies\CasePolicy');
        Gate::define('dashboard.cases.isClient', 'App\Policies\CasePolicy@isClient');
        Gate::define('dashboard.cases.manager', 'App\Policies\CasePolicy@manager');
        Gate::resource('dashboard.sessions', 'App\Policies\SessionPolicy');
        Gate::resource('dashboard.sessions.practices', 'App\Policies\PracticePolicy');
    }
}

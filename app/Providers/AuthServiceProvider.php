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
        \App\RelationshipUser::class => \App\Policies\RelationshipUserPolicy::class,
        \App\Assessment::class => \App\Policies\AssessmentPolicy::class,
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
    }
}

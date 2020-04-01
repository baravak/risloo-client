<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('dashboard.assessments.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);
    $trail->push(__('Assessments'), route('dashboard.assessments.index'));
});

Breadcrumbs::for('dashboard.samples.index', function ($trail, $data) {
    $trail->parent('dashboard.assessments.index', $data);
    $trail->push(__('Samples'), route('dashboard.samples.index'));
});


Breadcrumbs::for('dashboard.samples.create', function ($trail, $data) {
    $trail->parent('dashboard.samples.index', $data);
    $trail->push(__('Create new sampel'), route('dashboard.samples.index'));
});


Breadcrumbs::for('dashboard.relationships.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);
    $trail->push(__('Relationships'), route('dashboard.relationships.index'));
});

Breadcrumbs::for('dashboard.relationships.create', function ($trail, $data) {
    $trail->parent('dashboard.relationships.index', $data);
    $trail->push(__('Create new relationship'), route('dashboard.relationships.create'));
});

Breadcrumbs::for('dashboard.relationship.users.index', function ($trail, $data) {
    $trail->parent('dashboard.relationships.index', $data);
    $trail->push(request()->route()->parameters['relationship']);
    $trail->push(__('Relationship users'), route('dashboard.relationships.index'));
});

Breadcrumbs::for('dashboard.relationship.users.create', function ($trail, $data) {
    $trail->parent('dashboard.relationship.users.index', $data);
    $trail->push(__('Create new relationship-user'), route('dashboard.relationship.users.create', request()->route()->parameters['relationship']));
});

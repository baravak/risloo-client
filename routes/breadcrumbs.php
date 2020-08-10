<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('dashboard.centers.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);
    $trail->push(__('Therapy centers'), route('dashboard.centers.index'));
});

Breadcrumbs::for('dashboard.centers.create', function ($trail, $data) {
    $trail->parent('dashboard.centers.index', $data);
    $trail->push(__('Create new center'), route('dashboard.centers.create'));
});

Breadcrumbs::for('dashboard.centers.show', function ($trail, $data) {
    $trail->parent('dashboard.centers.index', $data);
    $trail->push($data['center']->detail->title, route('dashboard.centers.show', $data['center']->id));
});

Breadcrumbs::for('dashboard.centers.edit', function ($trail, $data) {
    $trail->parent('dashboard.centers.show', $data);
    $trail->push(__('Edit'), route('dashboard.centers.edit', $data['center']->id));
});

Breadcrumbs::for('dashboard.center.users.index', function ($trail, $data) {
    $trail->parent('dashboard.centers.show', $data);
    $trail->push(__('Users'), route('dashboard.center.users.index', $data['center']->id));
});

Breadcrumbs::for('dashboard.center.users.create', function ($trail, $data) {
    $trail->parent('dashboard.center.users.index', $data);
    $trail->push(__('Join new user'), route('dashboard.center.users.create', $data['center']->id));
});


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


Breadcrumbs::for('dashboard.rooms.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);
    if(isset($data['center']))
    {
        $trail->push($data['center']->detail->title, route('dashboard.centers.show', $data['center']->id));
    }
    $trail->push(__('Therapy rooms'), route('dashboard.rooms.index'));
});

Breadcrumbs::for('dashboard.rooms.create', function ($trail, $data) {
    $trail->parent('dashboard.rooms.index', $data);
    $trail->push(__('Create new room'), route('dashboard.rooms.create'));
});

Breadcrumbs::for('dashboard.rooms.show', function ($trail, $data) {
    $trail->parent('dashboard.rooms.index', $data);
    $trail->push(($data['room']->center ?: $data['room'])->detail->title, route('dashboard.centers.show', ($data['room']->center ?: $data['room'])->id));
    $trail->push($data['room']->type == 'room' ? __('Therapy room of :user', ['user' => $data['room']->manager->name]) : __('Personal'), route('dashboard.rooms.show', $data['room']->id));
});

Breadcrumbs::for('dashboard.room.users.index', function ($trail, $data) {
    $trail->parent('dashboard.rooms.show', $data);
    $trail->push(__(':type users', ['type' => __('Therapy room')]), route('dashboard.rooms.index'));
});

Breadcrumbs::for('dashboard.room.users.create', function ($trail, $data) {
    $trail->parent('dashboard.room.users.index', $data);
    $trail->push(__('Create new room-user'), route('dashboard.room.users.create', request()->route()->parameters['room']));
});

Breadcrumbs::for('dashboard.reserves.index', function ($trail, $data) {
    $trail->parent('dashboard.home', $data);
    $trail->push(__('Reservation'), route('dashboard.reserves.index'));
});
Breadcrumbs::for('dashboard.reserves.create', function ($trail, $data) {
    $trail->parent('dashboard.reserves.index', $data);
    $trail->push(__('Create new reserve'), route('dashboard.reserves.create'));
});

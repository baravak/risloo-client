<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Support\Facades\Gate;

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
        $trail->push(
            __('Users'),
            Gate::allows('viewAny', [App\CenterUser::class, $data['center']]) ? route('dashboard.center.users.index', $data['center']->id) : null
    );
});
Breadcrumbs::for('dashboard.center.users.show', function ($trail, $data) {
    $trail->parent('dashboard.center.users.index', $data);
    $trail->push(
        $data['center'] && $data['center']->acceptation && $data['center']->acceptation->id == $data['user']->id ? __('My profile') : ($data['user']->name ?: $data['user']->id),
        route('dashboard.center.users.show', ['center' => $data['center']->id, 'user' => $data['user']->id]));
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

Breadcrumbs::for('dashboard.samples.show', function ($trail, $data) {
    if($data['sample']->case){
        $trail->parent('dashboard.cases.show', $data);
    }else{
        if($data['sample']->client){
            $data['user'] = $data['sample']->client;
            $trail->parent('dashboard.center.users.show', $data);
        }else{
            $trail->parent('dashboard.rooms.show', $data);
        }
    }
    $trail->push(__('Samples'), null);
    $trail->push($data['sample']->id, route('dashboard.samples.show', $data['sample']->id));
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
    $trail->parent('dashboard.centers.show', $data);
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


Breadcrumbs::for('dashboard.sessions.index', function ($trail, $data) {
    if(isset($data['case'])){
        $trail->parent('dashboard.cases.show', $data);
    }else{
        $trail->parent('dashboard.home', $data);
    }

    $trail->push(__('Sessions'), null);
});

Breadcrumbs::for('dashboard.sessions.create', function ($trail, $data) {
    $trail->parent('dashboard.sessions.index', $data);
    $trail->push(__('Create session'), route('dashboard.sessions.index'));
});

Breadcrumbs::for('dashboard.sessions.edit', function ($trail, $data) {
    $trail->parent('dashboard.sessions.index', $data);
    $trail->push($data['session']->id, route('dashboard.sessions.edit', $data['session']->route('edit')));
});

Breadcrumbs::for('dashboard.cases.show', function ($trail, $data) {
    $trail->parent('dashboard.rooms.show', $data);
    $trail->push(__('Case'), null);
    $trail->push($data['case']->id, $data['case']->route('show'));
});


Breadcrumbs::for('dashboard.sessions.show', function ($trail, $data) {
    $trail->parent('dashboard.cases.show', $data);
    $trail->push(__('Session'), null);
    $trail->push($data['session']->id, $data['session']->route('show'));
});
Breadcrumbs::for('dashboard.sessions.practices.create', function ($trail, $data) {
    $trail->parent('dashboard.sessions.show', $data);
    $trail->push(__('Create new practice'), route('dashboard.sessions.practices.create', $data['session']->id));
});

Breadcrumbs::for('dashboard.room.cases.create', function ($trail, $data) {
    $trail->parent('dashboard.rooms.show', $data);
    $trail->push(__("Create new case"), route('dashboard.room.cases.create', $data['room']->id));
});

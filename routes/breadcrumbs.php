<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
Breadcrumbs::for('dashboard', function ($trail, $data) {
    $trail->push(__('Home'), route('dashboard'));
});

Breadcrumbs::for('dashboard.users.index', function ($trail, $data) {
    $trail->parent('dashboard', $data);
    $trail->push(__('Users'), route('dashboard.users.index'));
});
Breadcrumbs::for('dashboard.users.create', function ($trail, $data) {
    $trail->parent('dashboard.users.index', $data);
    $trail->push(__('Create new user'), route('dashboard.users.create'));
});
Breadcrumbs::for('dashboard.users.show', function ($trail, $data) {
    $trail->parent('dashboard.users.index', $data);
    $trail->push($data['user']->name ?: __('Anonymous'), route('dashboard.users.show', ['id'=> $data['user']->id]));
});
Breadcrumbs::for('dashboard.users.edit', function ($trail, $data) {
    $trail->parent('dashboard.users.show', $data);
    $trail->push(__('Edit'), route('dashboard.users.edit', ['id' => $data['user']->id]));
});

Breadcrumbs::for('dashboard.documents.index', function ($trail, $data) {
    $trail->parent('dashboard', $data);
    $trail->push(__('Documents'), route('dashboard.documents.index'));
});
Breadcrumbs::for('dashboard.documents.create', function ($trail, $data) {
    $trail->parent('dashboard.documents.index', $data);
    $trail->push(__('Create new document'), route('dashboard.documents.create'));
});
Breadcrumbs::for('dashboard.documents.show', function ($trail, $data) {
    $trail->parent('dashboard.documents.index', $data);
    $trail->push($data['user']->name ?: __('anonymous'), route('dashboard.documents.show', ['id' => $data['user']->id]));
});
Breadcrumbs::for('dashboard.documents.edit', function ($trail, $data) {
    $trail->parent('dashboard.documents.show', $data);
    $trail->push(__('Edit'), route('dashboard.documents.edit', ['id' => $data['user']->id]));
});

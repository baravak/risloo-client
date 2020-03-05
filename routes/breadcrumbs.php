<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
Breadcrumbs::for('dashboard', function ($trail, $data) {
    $trail->push(__('Home'), route('dashboard'));
});
Breadcrumbs::for('dashboard.users.index', function ($trail, $data) {
    $trail->parent('dashboard', $data);
    $trail->push(__('users.index'), route('dashboard.users.index'));
});
Breadcrumbs::for('dashboard.users.create', function ($trail, $data) {
    $trail->parent('dashboard.users.index', $data);
    $trail->push(__('users.create'), route('dashboard.users.create'));
});

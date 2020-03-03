<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
Breadcrumbs::for('dashboard', function ($trail, $data) {
    $trail->push(__('Home'), route('dashboard'));
});
Breadcrumbs::for('dashboard.users.index', function ($trail, $data) {
    $trail->parent('dashboard', $data);
    $trail->push(__('Users'), route('dashboard.users.index'));
});

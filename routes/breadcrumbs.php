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

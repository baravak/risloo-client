<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

class Controller extends _Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->data->layouts->asideMenue = 'layouts.menu';
        $this->data->layouts->vendor->amcharts4 = false;
    }
}

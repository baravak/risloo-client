<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller extends _Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->data->layouts->vendor->arraySetTrue([
            'fontawesome',
            'iziToast',
        ]);
    }
}

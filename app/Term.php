<?php
namespace App;

class Term extends API
{
    protected $guarded = [];
    public $with = [
        'creator' => User::class,
        'parents' => Term::class
    ];
}

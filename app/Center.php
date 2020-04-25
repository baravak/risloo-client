<?php
namespace App;

class Center extends Relationship
{
    public $endpointPath = 'relationships';
    public static function request($clinic_id)
    {
        return (new static)->execute('relationships/request', ['clinic_id' => $clinic_id], 'POST');
    }

    public static function accept($clinic_id)
    {
        return (new static)->execute('relationships/accept', ['clinic_id' => $clinic_id], 'POST');
    }
}

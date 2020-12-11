<?php
namespace App;


class Practice extends API
{
    public $parent = Session::class;
    public $endpointPath = 'sessions/%s/practices';
    public $with = [
        'attachments' => File::class,
    ];
        public static function homeworkStore($session, $practice, array $parameters = []){
            $request = new static;
            $endpointPath = sprintf ($request->endpointPath . '/%s/homework', $session, $practice);
            return $request->execute($endpointPath, $parameters, 'POST');
        }
    public function getSerialAttribute()
    {
        return [substr($this->id, 0, 1), substr($this->id, 1)];
    }
}

<?php

namespace App\Http\Tools;

class MetaData
{
    private $keys;

    public function __construct($keys = [
        'opencagedata' => 'd8d023fba5ad4c6d904081ee638c0d2d'
    ])
    {
        $this->keys = $keys;
    }

    public function getFormattedLocation($lat = '', $lng = '')
    {
        // filtro &no_annotations=1 => sin anotaciones
        $obj = json_decode(file_get_contents('https://api.opencagedata.com/geocode/v1/json?q=' . $lat . '+' . $lng . '&key=' . $this->keys['opencagedata'] . '&language=es'));
        return $obj->results[0];
    }
}

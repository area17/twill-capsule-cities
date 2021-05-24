<?php

namespace App\Twill\Capsules\Cities\Http\Controllers;

use App\Twill\Capsules\Base\ModuleController;

class CityController extends ModuleController
{
    protected $moduleName = 'cities';

    protected $titleColumnKey = 'name';

    protected $indexColumns = [
        'name' => [
            'title' => 'Name',
            'field' => 'name',
        ],

        'country' => [
            'title' => 'Country',
            'field' => 'country_name',
        ],
    ];

    protected $browserColumns = [
        'name' => [
            'title' => 'Name',
            'field' => 'name',
        ],
    ];
}

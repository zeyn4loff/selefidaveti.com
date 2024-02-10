<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
        /**
     * @param $filters
     * @return array
     */
    public function getFilters($filters)
    {
        $return = [];

        $params = \request()->all();

        foreach ($filters as $f) {
            if ( isset($params[$f]) )
                $return[$f] = $params[$f];
        }

        return $return;
    }
}

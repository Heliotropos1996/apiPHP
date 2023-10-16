<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function sendResponse($data, $status)
    {
        return response()->json($data, $status);
    }
}

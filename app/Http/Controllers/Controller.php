<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @OA\OpenApi(
     *      @OA\Info (
     *          vesion="1.0",
     *          title="Cars Api",
     *          description="Demo Cars Api",
     *      )
     * )
     */

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

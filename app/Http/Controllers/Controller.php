<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Internal\Source;
use Illuminate\Database\Eloquent\Model;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function getSourceData(Source $retailer, array $request_data): array|null
    {
        if ($retailer->locker) {
            return $retailer->addSourceValuesToArray($request_data);
        }
        return null;
       
    }
}

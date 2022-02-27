<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\PLargeSpec;
use Illuminate\Http\Request;

class PLargeSpecController extends ApiController
{
    public function fetchProducts(Request $request)
    {
        return PLargeSpec::getProductListByStandardId($request->get('standard_id'));
    }
}

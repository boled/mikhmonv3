<?php

namespace App\Http\Controllers;

use App\Services\Mikrotik\RadiusService;

class RadiusController extends Controller
{
    public function index(RadiusService $service)
    {
        return response()->json([
            'users' => $service->listUsers(),
        ]);
    }
}

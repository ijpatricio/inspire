<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\RouteDiscovery\Attributes\Route;

class ComponentController extends Controller
{
    #[Route(method: 'post')]
    public function __invoke(Request $request)
    {

        return app("App\\View\\Components\\{$request->name}")->render();
    }
}

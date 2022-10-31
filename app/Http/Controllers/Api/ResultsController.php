<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function __invoke()
    {
        $results = Vote::query()->get();

        return [
            'categories' => $results->pluck('name'),
            'data' => $results->pluck('count'),
        ];
    }
}

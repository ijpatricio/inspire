<?php

namespace App\Http\Controllers\Api;

use App\Events\NewVoteWasSubmitted;
use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;
use Spatie\RouteDiscovery\Attributes\Route;

class VoteController extends Controller
{
    #[Route(method: 'post')]
    public function __invoke(Request $request)
    {
        $name = str($request->get('name'))->slug();

        $vote = Vote::query()->firstOrCreate(['name' => $name]);

        $vote->increment('count');

        NewVoteWasSubmitted::dispatch();

        return $vote;
    }
}

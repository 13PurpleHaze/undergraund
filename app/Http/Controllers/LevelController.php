<?php

namespace App\Http\Controllers;

use App\Http\Resources\Level\LevelResource;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        $levels = LevelResource::collection($levels)->resolve();
        $user_level = auth()->user()->level;
        return inertia('Poem/Index', compact('levels', 'user_level'));
    }
}

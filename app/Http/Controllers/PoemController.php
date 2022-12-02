<?php

namespace App\Http\Controllers;

use App\Http\Resources\Poem\PoemResource;
use App\Models\Poem;
use Illuminate\Http\Request;

class PoemController extends Controller
{
    public function index()
    {
        $poems = Poem::all();
        $poems = PoemResource::collection($poems)->resolve();
        return inertia('Poem/Index', compact('poems'));
    }

    public function show(Poem $poem)
    {
        $poem = new PoemResource($poem);
        $poem = $poem->resolve();
        return inertia('Poem/Show', compact('poem'));
    }
}

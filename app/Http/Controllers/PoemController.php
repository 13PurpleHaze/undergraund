<?php

namespace App\Http\Controllers;

use App\Http\Requests\Poem\SolveRequest;
use App\Http\Resources\Poem\PoemResource;
use App\Models\Level;
use App\Models\Poem;
use App\Models\PoemUser;
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

    public function solve(SolveRequest $request)
    {
        $data = $request->validated();
        $result = PoemUser::firstOrCreate($data, ['poem_id' => $data['poem_id'], 'user_id' => auth()->user()->id]);
        $userLevel = auth()->user()->level_id;
        $level = Level::where('id', $userLevel + 1)->get()->first()->id ?? null;
        auth()->user()->level_id = $level ?? $userLevel;
        auth()->user()->save();
        return redirect()->route('poem.show', $data['poem_id']);
    }
}

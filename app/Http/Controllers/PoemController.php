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
        $result = PoemUser::firstOrCreate(['user_id' => auth()->user()->id, 'poem_id' => $data['poem_id']], ['poem_id' => $data['poem_id'], 'user_id' => auth()->user()->id]);
        $userLevel = auth()->user()->level_id;
        $levelUp = Level::where('id', $userLevel + 1)->get()->first()->id ?? null;
        $level = Level::where('id', $userLevel)->get()->first()->id ?? null;

        $poemsUser = auth()->user()->poems; // стихи, которые решил пользователь
        $poemsLevel = Poem::where('level_id', $userLevel)->get(); // стихи его уровня

        $poems = $poemsLevel->diff($poemsUser);
        if($poems->isEmpty()) {

            auth()->user()->level_id = $levelUp ?? $userLevel;
            auth()->user()->save();
        }
        return redirect()->route('level.index');
    }
}

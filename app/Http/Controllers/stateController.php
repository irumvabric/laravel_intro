<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\Flag;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('log', only: ['index']),
            new Middleware('subscribed', except: ['store']),
        ];
    }

    public function showStateCreate()
    {
        return view('statehome');
    }

    public function showStateHome()
    {
        $states = State::all();
        return view('states.homestate', ['states' => $states]);
    }

    public function showStateDelete()
    {
        return view('states.deletestate');
    }

    public function createState(Request $request)
    {
        $request->validate([
            'code' => ['required', 'min:1', 'max:3'],
            'name' => ['required', 'min:3', 'max:20'],
            'pib' => 'required',
            'population' => 'required|min:1',
            'flag' => 'required',
            'area' => 'required|min:1',
        ]);

        $filename = time() . '.' . $request->flag->extension();
        $path = $request->file('flag')->storeAs('FlagsUsa', $filename, 'public');

        $state = State::create([
            'code' => $request->code,
            'name' => $request->name,
            'pib' => $request->pib,
            'area' => $request->area,
            'population' => $request->population,
        ]);

        $flag = new Flag();
        $flag->path = $path;
        $state->flag()->save($flag);

        return redirect('/state')->with('status', 'State added');
    }

    public function updateState(int $id)
    {
        $state = State::findOrFail($id);
        return view('states.stateedit', ['state' => $state]);
    }

    public function update(Request $req, int $id)
    {
        $req->validate([
            'code' => ['required', 'min:1', 'max:3'],
            'name' => ['required', 'min:3', 'max:20'],
            'pib' => 'required',
            'population' => 'required|min:1',
            'area' => 'required|min:1',
        ]);

        State::findOrFail($id)->update($req->all());
        return redirect('/state')->with('status', 'State updated');
    }

    public function deleteState(int $id)
    {
        $state = State::findOrFail($id);
        $state->delete();
        return redirect('/state')->with('status', 'State deleted');
    }

    public function showStateDetails($pk)
    {
        $state = State::findOrFail($pk);
        return view('states.state_details', ['state' => $state]);
    }
}

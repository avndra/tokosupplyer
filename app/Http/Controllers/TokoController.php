<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $tokos = Toko::with(['owner', 'city'])->get();
        return view('tokos.index', compact('tokos'));
    }

    public function create()
    {
        if (\App\Models\Toko::where('owner_id', request()->user()->id)->exists()) {
            return redirect('/products');
        }

        $cities = \App\Models\City::all();
        return view('tokos.create', compact('cities'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name_toko' => 'required',
            'city_code' => 'required|exists:cities,id'
        ]);

        \App\Models\Toko::create([
            'name_toko' => $request->name_toko,
            'city_code' => $request->city_code,
            'owner_id' => $request->user()->id,
        ]);

        return redirect('/products');
    }

    public function edit($id)
    {
        $toko = Toko::findOrFail($id);
        $user = request()->user();

        if ($user->role !== 'admin' && $toko->owner_id !== $user->id) {
            abort(403, 'Unauthorized to edit this Toko.');
        }

        $cities = \App\Models\City::all();

        return view('tokos.edit', compact('toko', 'cities'));
    }


    public function update(Request $request, $id)
    {
        $toko = Toko::findOrFail($id);
        $user = request()->user();

        if ($user->role !== 'admin' && $toko->owner_id !== $user->id) {
            abort(403, 'Unauthorized to update this Toko.');
        }

        $toko->update($request->only('name_toko', 'city_code'));

        return redirect()->route('tokos.index');
    }


    public function destroy($id)
    {
        $toko = Toko::findOrFail($id);
        $user = request()->user();

        if ($user->role !== 'admin' && $toko->owner_id !== $user->id) {
            abort(403, 'Unauthorized to delete this Toko.');
        }

        $toko->delete();

        return redirect()->route('tokos.index');
    }

}

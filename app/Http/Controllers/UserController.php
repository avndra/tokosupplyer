<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('city')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $cities = City::all();
        return view('users.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'gender' => 'required|in:male,female',
            'city_code' => 'required|exists:cities,id',
        ]);

        User::create($request->all());
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $cities = City::all();
        return view('users.edit', compact('user', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'username' => 'required',
        'email' => 'required|email|unique:users,email,'.$id,
        'gender' => 'required|in:male,female',
        'city_code' => 'required|exists:cities,id',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::with('city')->findOrFail($id);
        return view('users.show', compact('user'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('users.create', compact('countries'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'names' => 'required',
            'lastnames' => 'required',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'addres' => 'required',
            'phone' => 'required',
            'countries_id' => 'required|exists:countries,id',
        ]);

        dd($request->all());

        User::create($request->all());
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $countries = Country::all();
        return view('users.edit', compact('user', 'countries'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'names' => 'required',
            'lastnames' => 'required',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'countries_id' => 'required|exists:countries,id',
        ]);


        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }




    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}

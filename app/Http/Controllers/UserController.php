<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Role;
use App\Models\Polling;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('user.index', [
            'users' => $data,
            'roles' => \App\Models\Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create', [
            'roles' => \App\Models\Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
            'id_role' => ['required', 'string']
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role' => $request->id_role
        ]);


        $nama = $user['name'];
        $success = "Data $nama berhasil ditambah";
        return redirect(route('user-index'))->with('success', $success);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
            'roles' => \App\Models\Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'old_password' => ['required', 'string'],
            'password' => ['required', 'confirmed'],
            'id_role' => ['required', 'string']
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'id_role' => $request->id_role
        ]);



        $nama = $user['name'];
        $success = "Data $nama berhasil ditambah";
        return redirect(route('user-index'))->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user -> delete();
        $nama = $user->name;
        $success = "Data $nama berhasil ditambah";
        return redirect(route('user-index'))->with('success', $success);
    }
}

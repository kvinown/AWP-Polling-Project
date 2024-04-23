<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Role::all();
        return view('role.index', [
            'roles' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'id' => 'required|string|max:10|unique:role',
            'nama' => 'required|string|max:100',
        ], [
            'id.unique' => 'ID Role sudah terdaftar',
            'id.required' => 'ID Role harus diisi',
            'nama.required' => 'Nama Role harus diisi',
        ])->validate();

        $role = new Role($validatedData);
        $role->save();
        $nama = $validedData['nama'];
        $success = "Data $nama berhasil ditambah";
        return redirect(route('role-index'))->with('success', $success);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role ->delete();
        $nama = $role->nama;
        $success = "Data $nama berhasil dihapus";
        return redirect(route('role-index'))->with('success', $success);
    }
}

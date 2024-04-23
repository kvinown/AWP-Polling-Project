<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Fakultas::all();
        return view('fakultas.index', [
            'faks' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'id' => 'required|string|max:10|unique:fakultas',
            'nama' => 'required|string|max:100'
        ], [
            'id.unique' =>'ID Fakultas Sudah terdaftar',
            'id.required' =>'ID Fakultas harus diisi',
            'nama.required' =>'Nama Fakultas harus diisi',
        ])->validate();
        $fakultas = new Fakultas($validatedData);
        $fakultas->save();
        $nama = $validatedData['nama'];
        $success = "Data $nama berhasil ditambah";
        return redirect(route('fakultas-index'))->with('success', $success
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas)
    {
        return view('fakultas.edit', [
            'fak' => $fakultas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        $validatedData = validator($request->all(), [
            'nama' => 'required|string|max:100'
        ],[
            'nama.required' => 'Nama Fakultas harus di isi'
        ])->validate();

        $fakultas -> nama = $validatedData['nama'];
        $fakultas->save();
        $nama = $validatedData['nama'];
        $success = "Data $nama berhasil diubah";
        return redirect(route('fakultas-index'))->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();
        $nama = $fakultas->nama;
        $success = "Data $nama berhasil dihapus";
        return redirect(route('fakultas-index'))->with('success', $success);
    }
}

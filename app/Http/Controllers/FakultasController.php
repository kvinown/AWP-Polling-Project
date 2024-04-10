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
        $validedData = validator($request->all(), [
            'id_fakultas' => 'required|string|max:10|unique:fakultas',
            'nama_fakultas' => 'required|string|max:100'
        ], [
            'id_fakultas.unique' =>'ID Fakultas Sudah terdaftar',
            'id_fakultas.required' =>'ID Fakultas harus diisi',
            'nama_fakultas.required' =>'Nama Fakultas harus diisi',
        ])->validate();

        $fakultas = new Fakultas($validedData);
        $fakultas->save();
        return redirect(route('fakultas-index'));
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
            'nama_fakultas' => 'required|string|max:100'
        ],[
            'nama_fakultas.required' => 'Nama Fakultas harus di isi'
        ])->validate();

        $fakultas -> nama_fakultas = $validatedData['nama_fakultas'];
        $fakultas->save();
        return redirect(route('fakultas-index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakultas)
    {
        $fakultas -> delete();
        return redirect(route('fakultas-index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kurikulum::all();
        return view('kurikulum.index', [
            'kurs' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kurikulum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validedData = validator($request->all(), [
            'id' => 'required|string|max:10|unique:kurikulum',
            'tahun' => 'required|integer',
        ], [
            'id.unique' => 'ID Kurikulum sudah terdaftar',
            'id.required' => 'ID Kurikulum harus diisi',
            'tahun.required' => 'Tahun Kurikulum harus diisi',
        ])->validate();

        $kurikulum = new Kurikulum($validedData);
        $kurikulum->save();
        $tahun = $validedData['tahun'];
        $success = "Kurikulum $tahun berhasil ditambah";
        return redirect(route('kurikulum-index'))->with('success', $success);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kurikulum $kurikulum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kurikulum $kurikulum)
    {
        return view('kurikulum.edit', [
            'kur' => $kurikulum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kurikulum $kurikulum)
    {
        $validatedData = validator($request->all(), [
            'tahun' => 'required|integer',
        ], [
            'tahun.required' => 'Tahun Kurikulum harus diisi',
        ])->validate();

        $kurikulum->update($validatedData);
        $tahun = $validatedData['tahun'];
        $success = "Kurikulum $tahun berhasil diubah";
        return redirect(route('kurikulum-index'))->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kurikulum $kurikulum)
    {
        $kurikulum ->delete();
        $tahun = $kurikulum->tahun;
        $success = "Kurikulum $tahun berhasil dihapus";
        return redirect(route('kurikulum-index'))->with('success', $success);
    }
}

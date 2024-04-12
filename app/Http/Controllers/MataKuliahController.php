<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MataKuliah::all();
        return view('mata_kuliah.index', [
            'mks' => $data,
            'kurs' => Kurikulum::all(),
            'progs' => ProgramStudi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mata_kuliah.create', [
            'kurs' => Kurikulum::all(),
            'progs' => ProgramStudi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'id' => 'required|string|max:10|unique:mata_kuliah',
            'nama' => 'required|string|max:100',
            'sks' => 'required|integer',
            'id_kurikulum' => 'required|string',
            'id_program_studi' => 'required|string',
        ], [
            'id.unique' => 'ID Mata Kuliah sudah ada',
            'id.required' => 'ID Mata Kuliah harus diisi',
            'nama.required' => 'Nama Mata Kuliah harus diisi',
            'id_kurikulum.required' => 'Kurikulum harus dipilih',
            'id_program_studi.required' => 'Program Studi harus dipilih',
        ])->validate();

        $mataKuliah = new MataKuliah($validatedData);
        $mataKuliah->save();
        return redirect(route('matakuliah-index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();
        return redirect(route('matakuliah-index'));
    }
}

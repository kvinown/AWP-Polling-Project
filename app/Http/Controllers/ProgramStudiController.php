<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProgramStudi::all();
        return view('program_studi.index', [
            'progs' => $data,
            'faks' => Fakultas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('program_studi.create',[
            'faks' => Fakultas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'id' => 'required|string|max:10|unique:program_studi',
            'nama' => 'required|string|max:100',
            'id_fakultas' => 'required|string|max:10',
        ], [
            'id.unique' => 'ID Program Studi sudah ada',
            'id.required' => 'ID Program Studi harus di i',
            'nama.required' => 'Nama Program Studi harus di isi',
            'id_fakultas.required' => 'ID Fakultas harus di isi',
            'id_fakultas.foreign' => 'ID Fakultas tidak ada',
        ])->validated();

        $programStudi = new ProgramStudi($validatedData);
        $programStudi->save();
        return redirect(route('programstudi-index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgramStudi $programStudi)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramStudi $programStudi)
    {
        return view('program_studi.edit', [
            'prog' => $programStudi,
            'faks' => Fakultas::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramStudi $programStudi)
    {
        $validatedData = validator($request->all(), [
            'nama' => 'required|string|max:100',
            'id_fakultas' => 'required|string|max:10',
        ], [
            'nama.required' => 'Nama Program Studi harus di isi',
            'id_fakultas.required' => 'ID Fakultas harus di isi',
            'id_fakultas.foreign' => 'ID Fakultas tidak ada',
        ])->validated();

        $programStudi -> nama = $validatedData['nama'];
        $programStudi -> id_fakultas = $validatedData['id_fakultas'];
        $programStudi->save();
        return redirect(route('programstudi-index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramStudi $programStudi)
    {
        $programStudi->delete();
        return redirect(route('programstudi-index'));
    }
}

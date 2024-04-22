<?php

namespace App\Http\Controllers;

use App\Models\Polling;
use Illuminate\Http\Request;

class PollingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Polling::all();
        return view('polling.index', [
            'pols' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('polling.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'id' => 'required|string|max:10|unique:polling', // Validasi bahwa ID polling harus unik di tabel polling
            'nama' => 'required|string|max:100',
            'started_date' => 'required|date',
            'ended_date' => 'required|date|after_or_equal:started_date', // Validasi bahwa tanggal akhir harus setelah atau sama dengan tanggal mulai
            'status' => 'required|string|max:100',
        ], [
            'id.unique' =>'ID Polling sudah terdaftar',
            'id.required' =>'ID Polling harus diisi',
            'nama.required' =>'Periode harus diisi',
            'started_date.required' =>'Tanggal Mulai harus diisi',
            'ended_date.required' =>'Tanggal Akhir harus diisi',
            'ended_date.after_or_equal' =>'Tanggal Akhir harus setelah atau sama dengan Tanggal Mulai',
            'status.required' =>'Status Polling harus diisi',
        ])->validate();

        $polling = new Polling($validatedData);
        $polling->save();
        $nama = $validatedData['nama'];
        $success = "Data $nama berhasil ditambah";
        return redirect(route('polling-index')) -> with('success', $success);
    }

    /**
     * Display the specified resource.
     */
    public function show(Polling $polling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Polling $polling)
    {
        return view('polling.edit', [
            'pol' => $polling
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Polling $polling)
    {
        $validatedData = validator($request->all(), [
            'status' => 'required|string|max:100',
        ], [
            'status.required' => 'Status Polling harus di isi',
        ])->validate();

        $polling -> status = $validatedData['status'];
        $polling->save();
        $nama = $validatedData['nama'];
        $success = "Data $nama berhasil diubah";
        return redirect(route('polling-index'))->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Polling $polling)
    {
        $polling ->delete();
        $nama = $polling->nama;
        $success = "Data $nama berhasil dihapus"
        return redirect(route('polling-index'))->with('success', $success);
    }
}

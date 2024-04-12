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
            'id' => 'required|string|max:10|unique:polling',
            'status' => 'required|string|max:100',
        ], [
            'id.unique' => 'ID Polling sudah ada',
            'id.required' => 'ID Polling harus di isi',
            'status.required' => 'Status Polling harus di isi',
        ])->validate();

        $polling = new Polling($validatedData);
        $polling->save();
        return redirect(route('polling-index'));

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
        return redirect(route('polling-index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Polling $polling)
    {
        $polling ->delete();
        return redirect(route('polling-index'));
    }
}

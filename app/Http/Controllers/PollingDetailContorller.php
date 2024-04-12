<?php

namespace App\Http\Controllers;

use App\Models\PollingDetail;
use Illuminate\Http\Request;

class PollingDetailContorller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PollingDetail::all();
        return view('polling_detail.index', [
            'pds' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('polling_detaili.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'id' => 'required|string|max:10|unique:polling_detail',
            'id_user' => 'required|string|max:10',
            'id_mata_kuliah' => 'required|string|max:10',
            'id_polling' => 'required|string|max:10',
        ], [
            'id.unique' => 'ID Polling Detail sudah ada',
            'id.required' => 'ID Polling Detail harus diisi',
            'id_user.required' => 'ID User harus diisi',
            'id_mata_kuliah.required' => 'ID Mata Kuliah harus diisi',
            'id_polling.required' => 'ID Polling harus diisi',
        ])->validate();

        $polling_detail = new PollingDetail($validatedData);
        $polling_detail->save();
        return redirect(route('pollingdetail'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PollingDetail $pollingDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PollingDetail $pollingDetail)
    {
        return view('polling_detail.edit', [
            'pd' => $pollingDetail
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PollingDetail $pollingDetail)
    {
        $validatedData = validator($request->all(), [
            'id_user' => 'required|string|max:10',
            'id_mata_kuliah' => 'required|string|max:10',
            'id_polling' => 'required|string|max:10',
        ], [
            'id_user.required' => 'ID User harus diisi',
            'id_mata_kuliah.required' => 'ID Mata Kuliah harus diisi',
            'id_polling.required' => 'ID Polling harus diisi',
        ])->validate();

        $pollingDetail->update($validatedData);
        return redirect(route('pollingdetail-index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PollingDetail $pollingDetail)
    {
        $pollingDetail->delete();
        return redirect(route('pollingdetail-index'));
    }
}

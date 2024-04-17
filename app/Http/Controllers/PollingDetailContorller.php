<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\Polling;
use App\Models\PollingDetail;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PollingDetailContorller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = auth()->user()->id_role;
        return view('polling_detail.index', [
            'role' => $role,
            'pds' => PollingDetail::all(),
            'pols' => Polling::all(),
            'users' => User::all(),
            'mks' => MataKuliah::all(),
            'kurs' => Kurikulum::all(),
            'progs' => ProgramStudi::all(),
        ]);
    }
public function hasil()
    {
        $role = auth()->user()->id_role;
        return view('polling_detail.hasil', [
            'role' => $role,
            'pds' => PollingDetail::all(),
            'pols' => Polling::all(),
            'users' => User::all(),
            'mks' => MataKuliah::all(),
            'kurs' => Kurikulum::all(),
            'progs' => ProgramStudi::all(),
        ]);

}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $idPolling = $request->input('id_polling');

        $pollingData = explode(',', $idPolling);
        $id = $pollingData[0];
        $nama = $pollingData[1];
        return view('polling_detail.create', [
            'pds' => PollingDetail::all(),
            'id_pol' => $id,
            'nama_pol' => $nama,
            'users' => User::all(),
            'mks' => MataKuliah::all(),
            'kurs' => Kurikulum::all(),
            'progs' => ProgramStudi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'matakuliah' => 'required|array',
            'matakuliah.*' => 'exists:mata_kuliah,id',
        ]);

        $id_user = auth()->user()->id;
        $id_polling = $request->input('id_polling');

        $inc = 0;
        foreach ($validatedData['matakuliah'] as $matakuliahId) {
            $pollingDetailId = $id_polling . '_' . $inc;
            $inc += 1;

            $data = [
                'id'=> $pollingDetailId,
                'id_user' => $id_user,
                'id_polling' => $id_polling,
                'id_mata_kuliah' => $matakuliahId,
            ];
            $pollingDetail = new PollingDetail($data);
            $pollingDetail->save();

            $polling = Polling::findOrFail($id_polling);
            $polling -> status = false;
            $polling->save();
        }

        return redirect(route('pollingdetail-hasil'));
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
            'pd' => $pollingDetail,
            'pol' => Polling::all(),
            'users' => User::all(),
            'mks' => MataKuliah::all(),
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
        return redirect(route('pollingdetail-hasil'));
    }
}

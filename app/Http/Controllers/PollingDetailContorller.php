<?php

namespace App\Http\Controllers;


use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\Polling;
use App\Models\PollingDetail;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function Symfony\Component\Translation\t;

class PollingDetailContorller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_user = auth()->user()->id;

        // Dapatkan semua ID polling yang ada di tabel PollingDetail
        $pollingDetailExists = PollingDetail::where('id_user', $id_user)->exists();
        $pol = PollingDetail::all();

        if ($pollingDetailExists) {
            $pollingValid = false;
        } else {
            $pollingValid = true;
        }

//        dd($id_user, $pollingValid, $pollingDetailExists, $pol);
        return view('polling_detail.index', [
            'pollingValid' => $pollingValid,
            'pols' => Polling::all(),
            'pds' => PollingDetail::all(),
            'users' => User::all(),
            'mks' => MataKuliah::all(),
            'kurs' => Kurikulum::all(),
            'progs' => ProgramStudi::all(),
        ]);
    }



    public function hasil()
    {
        $mkCount = DB::table('polling_detail')
            ->join('mata_kuliah', 'polling_detail.id_mata_kuliah', '=', 'mata_kuliah.id')
            ->select('polling_detail.id_mata_kuliah', DB::raw('COUNT(*) as total'), 'mata_kuliah.nama')
            ->groupBy('polling_detail.id_mata_kuliah', 'mata_kuliah.nama')
            ->get();

        return view('polling_detail.hasil', [
            'mkCount' => $mkCount,
        ]);
    }

    public function hasilDetail($id_mata_kuliah)
    {
        $pollingDetails = PollingDetail::where('id_mata_kuliah', $id_mata_kuliah)->get();

        return view('polling_detail.hasil-detail', [
            'pollingDetails' => $pollingDetails,
        ]);
    }

    public function hasilUser()
    {
        $role = auth()->user()->id_role;
        $id_user = auth()->user()->id;
        $pollingDetailExists = PollingDetail::where('id_user', $id_user)->exists();
        if ($pollingDetailExists) {
            $pollingValid = true;
        } else {
            $pollingValid = false;
        }


        if ($role == 2) {
            $polling_detail = PollingDetail::all();
        } else if ($role == 3) {
            $polling_detail = PollingDetail::where('id_user', $id_user)->get();
        }

        return view('polling_detail.hasil-detail-user', [
            'valid' => $pollingValid,
            'role' => $role,
            'pds' => $polling_detail,
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'matakuliah' => 'required|array',
            'matakuliah.*' => 'exists:mata_kuliah,id',
        ]);

        $id_user = auth()->user()->id;
        $id_polling = $request->input('id_polling');

        $total_sks = 0;
        foreach ($validatedData['matakuliah'] as $matakuliahId) {
            $matakuliah = MataKuliah::find($matakuliahId);
            $sks = $matakuliah->sks;
            $total_sks += $sks; // Menambahkan SKS ke total
        }

        if ($total_sks > 9) {
            return redirect()->route('pollingdetail-index')->withErrors(['sks' => 'Total SKS melebihi 9.']);
        }


        $inc = 0;
        foreach ($validatedData['matakuliah'] as $matakuliahId) {
            $pollingDetailId = $id_user . '-' . $id_polling . '-'. $matakuliahId . '-' . $inc;
            $inc += 1;

            $data = [
                'id'=> $pollingDetailId,
                'id_user' => $id_user,
                'id_polling' => $id_polling,
                'id_mata_kuliah' => $matakuliahId,
            ];
            $pollingDetail = new PollingDetail($data);
            $pollingDetail->save();
        }
        $nama = auth()->user()->nama;
        $success = "Data Polling $nama berhasil di input";
        return redirect(route('pollingdetail-hasil-detail-user'))->with('success', $success);
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

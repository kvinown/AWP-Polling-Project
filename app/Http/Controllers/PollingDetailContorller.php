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
        $id_pollings = PollingDetail::distinct('id_polling')->pluck('id_polling');

        // Inisialisasi variabel untuk menandai keberadaan entri PollingDetail untuk setiap ID polling
        $allPollingsExist = true;

        // Dapatkan semua polling
        $pollings = Polling::all();

        // Iterasi melalui setiap ID polling
        foreach ($id_pollings as $id_polling) {
            // Periksa keberadaan entri dalam PollingDetail untuk ID pengguna dan ID polling saat ini
            $pollingDetailExists = PollingDetail::where('id_user', $id_user)
                ->where('id_polling', $id_polling)
                ->exists();

            // Jika tidak ada entri yang ditemukan untuk ID pengguna dan ID polling saat ini
            // Atau jika polling tidak valid karena statusnya false atau di luar rentang tanggal
            // Atur $allPollingsExist menjadi false
            if (!$pollingDetailExists || !$pollings->firstWhere('id', $id_polling)->status ||
                !now()->between($pollings->firstWhere('id', $id_polling)->started_date, $pollings->firstWhere('id', $id_polling)->ended_date)) {
                $allPollingsExist = false;
                break; // Keluar dari loop karena tidak perlu lagi memeriksa polling berikutnya
            }
        }

        // Polling menjadi valid jika setiap ID polling memiliki entri dalam PollingDetail untuk ID pengguna tertentu
        // dan setiap polling memiliki status true dan berada dalam rentang tanggal yang tepat
        $pollingValid = $allPollingsExist;

        return view('polling_detail.index', [
            'pollingValid' => $pollingValid,
            'pols' => $pollings,
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

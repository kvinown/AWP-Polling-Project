@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-matakuliah')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="row d-flex">
                    <h5 class="card-title col-md">Data Mata Kuliah</h5>
                    <button
                        type="button"
                        class="col-md-1 btn btn-primary ms-auto">
                        Tambah
                    </button>
                </div>
                <table
                    class="mt-2 table table-bordered"
                    width="100%">
                    <thead class="border border-dark">
                    <tr>
                        <th scope="col">Kode MK</th>
                        <th scope="col">Nama Mata Kuliah</th>
                        <th scope="col">SKS</th>
                        <th scope="col">Kurikulum</th>
                        <th scope="col">Program Studi</th>
                    </tr>
                    </thead>
                    <tbody class="border border-dark">
                    @foreach($mks as $mk)
                        <tr>
                            <td>{{$mk->id_mata_kuliah}}</td>
                            <td>{{$mk->nama_mata_kuliah}}</td>
                            <td>{{$mk->sks}}</td>
                            <td>{{$mk->id_kurikulum}}</td>
                            <td>{{$mk->id_program_studi}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

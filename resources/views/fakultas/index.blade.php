@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-fakultas')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="row d-flex">
                    <h5 class="card-title col-md">Data Fakultas</h5>
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
                        <th scope="col">ID Fakultas</th>
                        <th scope="col">Nama Fakultas</th>
                    </tr>
                    </thead>
                    <tbody class="border border-dark">
                    @foreach($faks as $fak)
                        <tr>
                            <td>{{$fak->id_fakultas}}</td>
                            <td>{{$fak->nama_fakultas}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

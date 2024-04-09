@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-matakuliah')
    <!-- Edn Header -->
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
                    </tr>
                    </thead>
                    <tbody class="border border-dark">
                    <tr>
                        <td>IN217</td>
                        <td>Teknik Komunikasi Bahasa Inggris</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>IN217</td>
                        <td>Teknik Komunikasi Bahasa Inggris</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>IN217</td>
                        <td>Teknik Komunikasi Bahasa Inggris</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>IN217</td>
                        <td>Teknik Komunikasi Bahasa Inggris</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>IN217</td>
                        <td>Teknik Komunikasi Bahasa Inggris</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>IN217</td>
                        <td>Teknik Komunikasi Bahasa Inggris</td>
                        <td>2</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

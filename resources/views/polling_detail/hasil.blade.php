@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-hasil')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="row d-flex">
                    <h5 class="card-title col-md">Data Hasil</h5>
                </div>
                <table class="mt-2 table table-bordered" width="100%">
                    <thead class="border border-dark">
                    <tr>
                        <th scope="col">Nama Mata Kuliah</th>
                        <th scope="col">Jumlah Respon</th>
                        <th scope="col">Detail</th>
                    </tr>
                    </thead>
                    <tbody class="border border-dark">
                    @foreach($mkCount as $mk)
                        <tr>
                            <td>{{$mk->nama}}</td>
                            <td>{{$mk->total}}</td>
                            <td>
                                <a href="{{ route('pollingdetail-hasil-detail', ['id_mata_kuliah' => $mk->id_mata_kuliah]) }}" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

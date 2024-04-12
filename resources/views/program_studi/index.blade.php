@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-programstudi')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="row d-flex">
                    <h5 class="card-title col-md">Data Fakultas</h5>
                    <a
                        href="{{route('programstudi-create')}}"
                        class="col-md-1 btn btn-primary ms-auto">
                        Tambah
                    </a>
                </div>
                <table
                    class="mt-2 table table-bordered"
                    width="100%">
                    <thead class="border border-dark">
                    <tr>
                        <th scope="col">ID Program Studi</th>
                        <th scope="col">Nama Program Studi</th>
                        <th scope="col">ID Fakultas</th>
                        <th scope="col">Nama Fakultas</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody class="border border-dark">
                    @foreach($progs as $prog)
                        <tr>
                            <td>{{$prog->id}}</td>
                            <td>{{$prog->nama}}</td>
                            <td>{{$prog->id_fakultas}}</td>
                            @php
                                $fakultas = $faks->firstWhere('id', $prog->id_fakultas);
                            @endphp
                            <td>{{ $fakultas->nama ?? '' }}</td>
                            <td>
                                <a href="{{ route('programstudi-delete', ['programStudi' => $prog->id]) }}" role="button" class="btn btn-danger" onclick="return confirmDelete()">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <script>
                                    function confirmDelete() {
                                        return confirm("Apakah Anda yakin menghapus data ini?");
                                    }
                                </script>
                            </td>
                            <td>
                                <a href="{{ route('programstudi-edit', ['programStudi' => $prog->id]) }}" role="button" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

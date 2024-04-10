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
                    <a
                        href="{{route('fakultas-create')}}"
                        class="col-md-1 btn btn-primary ms-auto">
                        Tambah
                    </a>
                </div>
                <table
                    class="mt-2 table table-bordered"
                    width="100%">
                    <thead class="border border-dark">
                    <tr>
                        <th scope="col">ID Fakultas</th>
                        <th scope="col">Nama Fakultas</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                    </tr>
                    </thead>
                    <tbody class="border border-dark">
                    @foreach($faks as $fak)
                        <tr>
                            <td>{{$fak->id}}</td>
                            <td>{{$fak->nama}}</td>
                            <td>
                                <a href="{{ route('fakultas-delete', ['fakultas' => $fak->id]) }}" role="button" class="btn btn-danger" onclick="return confirmDelete()">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <script>
                                    function confirmDelete() {
                                        return confirm("Apakah Anda yakin menghapus data ini?");
                                    }
                                </script>
                            </td>
                            <td>
                                <a href="{{ route('fakultas-edit', ['fakultas' => $fak->id]) }}" role="button" class="btn btn-warning">
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

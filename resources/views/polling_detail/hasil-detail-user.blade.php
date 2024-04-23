@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-hasil')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="row d-flex">
                    <h5 class="card-title col-md">Data Hasil Polling
                        @if($valid)
                        {{$pds[0] -> polling -> nama}}
                        @endif

                    </h5>
                </div>
                @if($valid)
                <table
                    class="mt-2 table table-bordered"
                    width="100%">
                    <thead class="border border-dark">
                    <tr>
                        <th scope="col">ID Polling Detail</th>
                        <th scope="col">Periode</th>
                        <th scope="col">ID Mata Kuliah</th>
                        <th scope="col">Nama Mata Kuliah</th>
                        @if(auth()->user()->id_role == '1')
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody class="border border-dark">
                    @foreach($pds as $pd)
                        <tr>
                            <td>{{$pd->id}}</td>
                            <td>{{$pd->polling->nama}}</td>
                            <td>{{$pd->id_mata_kuliah}}</td>
                            <td>{{$pd->mataKuliah->nama}}</td>
                            @if(auth()->user()->id_role == '1')
                                <td>
                                    <a href="{{ route('pollingdetail-delete', ['pollingDetail' => $pd->id]) }}" role="button" class="btn btn-danger" onclick="return confirmDelete()">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <script>
                                        function confirmDelete() {
                                            return confirm("Apakah Anda yakin menghapus data ini?");
                                        }
                                    </script>
                                </td>
                                <td>
                                    <a href="{{ route('pollingdetail-edit', ['pollingDetail' => $pd->id]) }}" role="button" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                <p>Belum ada yang polling saat ini</p>
                @endif
            </div>
        </div>
    </section>
@endsection

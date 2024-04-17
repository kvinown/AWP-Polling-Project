    @extends('layouts.master')

    @section('web-content')
        <!-- Header -->
        @include('layouts.header-polling')
        <!-- End Header -->
        <section class="content">
            <div class="container">
                <div class="card">
                    <div class="row d-flex">
                        <h5 class="card-title col-md">Data Polling</h5>
                        <a
                            href="{{route('polling-create')}}"
                            class="col-md-1 btn btn-primary ms-auto">
                            Tambah
                        </a>
                    </div>
                    <table
                        class="mt-2 table table-bordered"
                        width="100%">
                        <thead class="border border-dark">
                        <tr>
                            <th scope="col">ID Polling</th>
                            <th scope="col">Periode Polling</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Selesai</th>
                            <th scope="col">Status Polling</th>
                            @if(auth()->user()->id_role == '1')
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody class="border border-dark">
                        @foreach($pols as $pol)
                            <tr>
                                <td>{{$pol->id}}</td>
                                <td>{{$pol->nama}}</td>
                                <td>{{$pol->started_date}}</td>
                                <td>{{$pol->ended_date}}</td>
                                <td>{{$pol->status}}</td>
                                @if(auth()->user()->id_role == '1')
                                <td>
                                    <a href="{{ route('polling-delete', ['polling' => $pol->id]) }}" role="button" class="btn btn-danger" onclick="return confirmDelete()">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <script>
                                        function confirmDelete() {
                                            return confirm("Apakah Anda yakin menghapus data ini?");
                                        }
                                    </script>
                                </td>
                                <td>
                                    <a href="{{ route('polling-edit', ['polling' => $pol->id]) }}" role="button" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    @endsection

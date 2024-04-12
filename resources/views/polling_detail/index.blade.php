    @extends('layouts.master')

    @section('web-content')
        <!-- Header -->
        @include('layouts.header-polling_detail')
        <!-- End Header -->
        <section class="content">
            <div class="container">
                <div class="card">
                    <div class="row d-flex">
                        <h5 class="card-title col-md">Data Polling Detail</h5>
                        <a
                            href="{{route('polling_detail-create')}}"
                            class="col-md-1 btn btn-primary ms-auto">
                            Tambah
                        </a>
                    </div>
                    <table
                        class="mt-2 table table-bordered"
                        width="100%">
                        <thead class="border border-dark">
                        <tr>
                            <th scope="col">ID Polling Detail</th>
                            <th scope="col">ID User</th>
                            <th scope="col">ID Mata Kuliah</th>
                            <th scope="col">ID Polling</th>
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
                                <td>{{$pd->id_user}}</td>
                                <td>{{$pd->id_mata_kuliah}}</td>
                                <td>{{$pd->id_polling}}</td>
                                @if(auth()->user()->id_role == '1')
                                <td>
                                    <a href="{{ route('polling_detail-delete', ['polling_detail' => $pd->id]) }}" role="button" class="btn btn-danger" onclick="return confirmDelete()">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <script>
                                        function confirmDelete() {
                                            return confirm("Apakah Anda yakin menghapus data ini?");
                                        }
                                    </script>
                                </td>
                                <td>
                                    <a href="{{ route('polling_detail-edit', ['polling_detail' => $pd->id]) }}" role="button" class="btn btn-warning">
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

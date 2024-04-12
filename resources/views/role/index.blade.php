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
                            href="{{route('role-create')}}"
                            class="col-md-1 btn btn-primary ms-auto">
                            Tambah
                        </a>
                    </div>
                    <table
                        class="mt-2 table table-bordered"
                        width="100%">
                        <thead class="border border-dark">
                        <tr>
                            <th scope="col">ID Role</th>
                            <th scope="col">Nama Role</th>
                            @if(auth()->user()->id_role == '1')
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody class="border border-dark">
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->nama}}</td>
                                @if(auth()->user()->id_role == '1')
                                <td>
                                    <a href="{{ route('role-delete', ['role' => $role->id]) }}" role="button" class="btn btn-danger" onclick="return confirmDelete()">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <script>
                                        function confirmDelete() {
                                            return confirm("Apakah Anda yakin menghapus data ini?");
                                        }
                                    </script>
                                </td>
                                <td>
                                    <a href="{{ route('role-edit', ['role' => $role->id]) }}" role="button" class="btn btn-warning">
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

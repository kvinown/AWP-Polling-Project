    @extends('layouts.master')

    @section('web-content')
        <!-- Header -->
        @include('layouts.header-user')
        <!-- End Header -->
        <section class="content">
            <div class="container">
                <div class="card">
                    <div class="row d-flex">
                        <h5 class="card-title col-md">Data User</h5>
                        <a
                            href="{{route('user-create')}}"
                            class="col-md-1 btn btn-primary ms-auto">
                            Tambah
                        </a>
                    </div>
                    <table
                        class="mt-2 table table-bordered"
                        width="100%">
                        <thead class="border border-dark">
                        <tr>
                            <th scope="col">ID User</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                        </tr>
                        </thead>
                        <tbody class="border border-dark">
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                @php
                                    $role = $roles->firstWhere('id', $user->id_role);
                                @endphp
                                <td>{{ $role->nama ?? '' }}</td>
                                <td>
                                    <a href="{{ route('user-delete', ['user' => $user->id]) }}" role="button" class="btn btn-danger" onclick="return confirmDelete()">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <script>
                                        function confirmDelete() {
                                            return confirm("Apakah Anda yakin menghapus data ini?");
                                        }
                                    </script>
                                </td>
                                <td>
                                    <a href="{{ route('user-edit', ['user' => $user->id]) }}" role="button" class="btn btn-warning">
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

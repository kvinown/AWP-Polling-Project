    @extends('layouts.master')

    @section('web-content')
        <!-- Header -->
        @include('layouts.header-home')
        <!-- End Header -->
        <section class="content">
            <div class="container">
                <div class="card">
                    <div class="row d-flex">
                        <h5 class="card-title col-md">Data Kurikulum</h5>
                        <a
                            href="{{route('kurikulum-create')}}"
                            class="col-md-1 btn btn-primary ms-auto">
                            Tambah
                        </a>
                    </div>
                    <table
                        class="mt-2 table table-bordered"
                        width="100%">
                        <thead class="border border-dark">
                        <tr>
                            <th scope="col">ID Kurikulum</th>
                            <th scope="col">Tahun kurikulum</th>
                            <th scope="col">Semester kurikulum</th>
                            @if(auth()->user()->id_role == '1')
                            <th scope="col">Delete</th>
                            <th scope="col">Edit</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody class="border border-dark">
                        @foreach($kurs as $kur)
                            <tr>
                                <td>{{$kur->id}}</td>
                                <td>{{$kur->tahun}}</td>
                                <td>{{$kur->semester}}</td>
                                @if(auth()->user()->id_role == '1')
                                <td>
                                    <a href="{{ route('kurikulum-delete', ['kurikulum' => $kur->id]) }}" role="button" class="btn btn-danger" onclick="return confirmDelete()">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <script>
                                        function confirmDelete() {
                                            return confirm("Apakah Anda yakin menghapus data ini?");
                                        }
                                    </script>
                                </td>
                                <td>
                                    <a href="{{ route('kurikulum-edit', ['kurikulum' => $kur->id]) }}" role="button" class="btn btn-warning">
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

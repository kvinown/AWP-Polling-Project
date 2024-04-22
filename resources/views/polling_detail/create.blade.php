@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-polling_detail')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="row d-flex">
                    <h5 class="card-title col-md">Data Polling Detail {{$nama_pol}}</h5>
                    <a href="{{ route('pollingdetail-create') }}" class="col-md-1 btn btn-primary ms-auto">
                        Tambah
                    </a>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ implode('', $errors->all(':message')) }}
                    </div>
                @endif

                <!-- Formulir polling -->
                <form action="{{ route('pollingdetail-store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_polling" id="id_polling" value="{{ $id_pol }}">
                    <table class="mt-2 table table-bordered" width="100%">
                        <thead class="border border-dark">
                        <tr>
                            <th scope="col">Check</th>
                            <th scope="col">ID Mata Kuliah</th>
                            <th scope="col">Nama Mata Kuliah</th>
                            <th scope="col">SKS Mata Kuliah</th>
                            <th scope="col">Kurikulum</th>
                            <th scope="col">Program Studi</th>
                            @if(auth()->user()->id_role == '1')
                                <th scope="col">Delete</th>
                                <th scope="col">Edit</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody class="border border-dark">
                        @foreach($mks as $mk)
                            <tr>
                                <td>
                                    <input type="checkbox" name="matakuliah[]" id="{{ $mk->nama }}" value="{{ $mk->id }}">
                                </td>
                                <td>{{ $mk->id }}</td>
                                <td>
                                    <label for="{{ $mk->nama }}">
                                        {{ $mk->nama }}
                                    </label>
                                </td>
                                <td>{{ $mk->sks }}</td>
                                <td>{{ $mk->Kurikulum->tahun }}</td>
                                <td>{{ $mk->ProgramStudi->nama }}</td>
                                @if(auth()->user()->id_role == '1')
                                    <td>
                                        <a href="{{ route('matakuliah-delete', ['mataKuliah' => $mk->id]) }}" role="button" class="btn btn-danger" onclick="return confirmDelete()">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <script>
                                            function confirmDelete() {
                                                return confirm("Apakah Anda yakin menghapus data ini?");
                                            }
                                        </script>
                                    </td>
                                    <td>
                                        <a href="{{ route('matakuliah-edit', ['mataKuliah' => $mk->id]) }}" role="button" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer">
                        {{-- Submit --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

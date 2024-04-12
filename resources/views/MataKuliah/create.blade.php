@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-matakuliah')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger">
                    {{implode('', $errors->all(':message'))}}
                </div>
            @endif
            <div class="card p-4">
                <form action="{{route('matakuliah-store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id">ID Mata Kuliah</label>
                            <input class="my-2 form-control" type="text" name="id" id="id" placeholder="ID Matakuliah" required autofocus maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Mata Kuliah</label>
                            <input class="my-2 form-control" type="text" name="nama" id="nama" placeholder="Nama Matakuliah" autofocus maxlength="100">
                        </div>
                        <div class="form-group">
                            <label for="sks">SKS Mata Kuliah</label>
                            <input class="my-2 form-control" type="number" name="sks" id="sks" placeholder="SKS Matakuliah" autofocus maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="id_kurikulum">ID Kurikulum</label>
                            <input class="my-2 form-control" type="text" name="id_kurikulum" id="id_kurikulum" placeholder="ID Kurikulum" autofocus maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="id_program_studi">ID Program Studi</label>
                            <input class="my-2 form-control" type="text" name="id_program_studi" id="id_program_studi" placeholder="ID Program Studi" autofocus maxlength="10">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

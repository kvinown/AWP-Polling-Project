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
                <form action="{{ route('matakuliah-update', ['mataKuliah' => $mk->id]) }}" method="post">
                    @csrf
                    <div class="card-body">
                        {{-- ID Mata Kuliah --}}
                        <div class="form-group">
                            <label for="id">ID Mata Kuliah</label>
                            <input class="my-2 form-control" type="text" name="id" id="id" placeholder="ID Matakuliah" required autofocus maxlength="10" readonly value="{{$mk->id}}">
                        </div>
                        {{-- Nama Mata Kuliah --}}
                        <div class="form-group">
                            <label for="nama">Nama Mata Kuliah</label>
                            <input class="my-2 form-control" type="text" name="nama" id="nama" placeholder="Nama Matakuliah" required autofocus maxlength="100" value="{{$mk->nama}}">
                        </div>
                        {{-- SKS --}}
                        <div class="form-group">
                            <label for="sks">SKS Mata Kuliah</label>
                            <input class="my-2 form-control" type="number" name="sks" id="sks" placeholder="SKS Matakuliah" required autofocus maxlength="10" value="{{$mk->sks}}">
                        </div>
                        {{-- ID Kurikulum --}}
                        <div class="form-group">
                            <label for="id_kurikulum">ID Kurikulum</label>
                            <select name="id_kurikulum" id="id_kurikulum">
                                @foreach($kurs as $kur)
                                    <option value="{{$kur->id}}">{{$kur->id}} - {{$kur->tahun}} - {{$kur->semester}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- ID Program Studi --}}
                        <div class="form-group">
                            <label for="id_program_studi">ID Program Studi</label>
                            <select name="id_program_studi" id="id_program_studi">
                                @foreach($progs as $prog)
                                    <option value="{{$prog->id}}">{{$prog->id}} - {{$prog->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{-- Submit --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

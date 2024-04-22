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
                    <a href="{{ route('pollingdetail-create') }}" class="col-md-1 btn btn-primary ms-auto">
                        Tambah
                    </a>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ implode('', $errors->all(':message')) }}
                    </div>
                @endif
                <form method="post" action="{{ route('pollingdetail-create') }}">
                    @csrf
                    <label for="id_polling">Pilih Periode:</label>
                    <select name="id_polling" id="id_polling">
                        @foreach($pols as $pol)
                            <option value="{{ $pol->id }},{{ $pol->nama }}">{{ $pol->id }} - {{ $pol->nama }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <div class="design">
                    <h6>Gagal perwalian dapat dikarenakan:
                        <ul>
                            <li>Perwalian di luar jadwal yang ditentukan</li>
                            <li>Kewajiban keuangan mahasiswa belum terpenuhi</li>
                            <li>Tidak terdaftar sebagai mahasiswa aktif</li>
                            <li>Belum mengembalikan pinjaman buku</li>
                        </ul>
                        Informasi Perwalian:
                        <ul>
                            <li>Mata kuliah berwarna merah: mata kuliah dengan prasyarat / mata kuliah yang belum diambil</li>
                            <li>Mata kuliah berwarna hitam: mata kuliah yang sudah diambil</li>
                        </ul>
                    </h6>
                </div>
            </div>
        </div>
    </section>
@endsection

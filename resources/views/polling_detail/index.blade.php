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
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ implode('', $errors->all(':message')) }}
                    </div>
                @endif
                {{-- Tampilkan form dan pilihan polling hanya jika kondisi polling berlaku --}}
                @if($pollingValid)
                    <form method="post" action="{{ route('pollingdetail-create') }}">
                        @csrf
                        <div class="d-block">
                            <label for="id_polling">Pilih Periode:</label>
                            <select name="id_polling" id="id_polling">
                                @foreach($pols as $pol)
                                    @if($pol->status == 1)
                                        <option value="{{ $pol->id }},{{ $pol->nama }}">{{ $pol->id }} - {{ $pol->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @else
                    <p>Tidak ada polling yang dapat dipilih saat ini.</p>
                @endif

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
                            <li>Mata kuliah berwarna merah: mata kuliah dengan prasyarat / mata kuliah yang belum diambil</li>
                            <li>Mata kuliah berwarna hitam: mata kuliah yang sudah diambil</li>
                        </ul>
                    </h6>
                </div>
            </div>
        </div>
    </section>
@endsection

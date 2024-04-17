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
            </div>
        </div>
    </section>
@endsection

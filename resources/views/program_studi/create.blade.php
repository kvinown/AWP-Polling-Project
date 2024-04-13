@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-fakultas')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger">
                    {{implode('', $errors->all(':message'))}}
                </div>
            @endif
            <div class="card p-4">
                <form action="{{route('programstudi-store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        {{-- ID Program Studi --}}
                        <div class="form-group">
                            <label for="id">ID Program Studi</label>
                            <input class="my-2 form-control" type="text" name="id" id="id" placeholder="ID Program Studi" required autofocus maxlength="10">
                        </div>
                        {{-- Nama Program Studi --}}
                        <div class="form-group">
                            <label for="nama">Nama Program Studi</label>
                            <input class="my-2 form-control" type="text" name="nama" id="nama" placeholder="Nama Program Studi" autofocus maxlength="100">
                        </div>
                        {{-- ID Fakultas --}}
                        <div class="form-group">
                            <label for="id_fakultas">ID Fakultas</label><br>
                            <select name="id_fakultas" id="id_fakultas">
                                @foreach($faks as $fak)
                                    <option value="{{ $fak->id }}">{{ $fak->id }} - {{ $fak->nama }}</option>
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

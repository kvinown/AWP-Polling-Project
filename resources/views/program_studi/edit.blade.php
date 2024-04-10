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
                <form action="{{route('programstudi-update', ['programStudi' => $prog -> id])}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id">ID Program Studi</label>
                            <input class="my-2 form-control" type="text" name="id" id="id" placeholder="ID Program Studi" required autofocus maxlength="10" readonly value="{{$prog->id}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Program Studi</label>
                            <input class="my-2 form-control" type="text" name="nama" id="nama" placeholder="Nama Program Studi" required autofocus maxlength="100" value="{{$prog->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="id_fakultas">ID Fakultas</label><br>
                            <select name="id_fakultas" id="id_fakultas">
                                <option value="{{$prog->id_fakultas}}" selected>{{$prog->id_fakultas}}</option>
                                @foreach($faks as $fak)
                                    <option value="{{ $fak->id }}">{{ $fak->id }} - {{ $fak->nama }}</option>
                                @endforeach
                            </select>
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

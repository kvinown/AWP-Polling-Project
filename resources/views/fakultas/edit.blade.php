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
                <form action="{{route('fakultas-update', ['fakultas' => $fak->id_fakultas])}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_fakultas">ID Fakultas</label>
                            <input class="my-2 form-control" type="text" name="id_fakultas" id="id_fakultas" placeholder="ID Fakultas" required autofocus maxlength="10" readonly value="{{$fak->id_fakultas}}">
                        </div>
                        <div class="form-group">
                            <label for="nama_fakultas">Nama Fakultas</label>
                            <input class="my-2 form-control" type="text" name="nama_fakultas" id="nama_fakultas" placeholder="Nama Fakultas" required autofocus maxlength="100" value="{{$fak->nama_fakultas}}">
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

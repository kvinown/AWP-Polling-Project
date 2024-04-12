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
                <form action="{{route('fakultas-update', ['fakultas' => $fak->id])}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id">ID Fakultas</label>
                            <input class="my-2 form-control" type="text" name="id" id="id" placeholder="ID Fakultas" required autofocus maxlength="10" readonly value="{{$fak->id}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Fakultas</label>
                            <input class="my-2 form-control" type="text" name="nama" id="nama" placeholder="Nama Fakultas" required autofocus maxlength="100" value="{{$fak->nama}}">
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

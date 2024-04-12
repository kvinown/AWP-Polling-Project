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
                <form action="{{route('fakultas-store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id">ID Fakultas</label>
                            <input class="my-2 form-control" type="text" name="id" id="id" placeholder="ID Fakultas" required autofocus maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Fakultas</label>
                            <input class="my-2 form-control" type="text" name="nama" id="nama" placeholder="Nama Fakultas" autofocus maxlength="100">
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

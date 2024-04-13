@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-role')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger">
                    {{implode('', $errors->all(':message'))}}
                </div>
            @endif
            <div class="card p-4">
                <form action="{{route('role-store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        {{-- ID Role --}}
                        <div class="form-group">
                            <label for="id">ID Role</label>
                            <input class="my-2 form-control" type="text" name="id" id="id" placeholder="ID Role" required autofocus maxlength="10">
                        </div>
                        {{-- Nama Role --}}
                        <div class="form-group">
                            <label for="nama">Nama Role</label>
                            <input class="my-2 form-control" type="text" name="nama" id="nama" placeholder="Nama Role" autofocus maxlength="100">
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

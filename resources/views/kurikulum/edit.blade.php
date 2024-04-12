@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-home')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger">
                    {{implode('', $errors->all(':message'))}}
                </div>
            @endif
            <div class="card p-4">
                <form action="{{route('kurikulum-update', ['kurikulum' => $kur->id])}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id">ID Kurikulum</label>
                            <input class="my-2 form-control" type="text" name="id" id="id" placeholder="ID Kurikulum" required autofocus maxlength="10" readonly value="{{$kur->id}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Tahun Kurikulum</label>
                            <input class="my-2 form-control" type="number" name="tahun" id="tahun" placeholder="Tahun Kurikulum" required autofocus value="{{$kur->tahun}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Semester Kurikulum</label>
                            <input class="my-2 form-control" type="number" name="semester" id="semester" placeholder="Semester Kurikulum" required autofocus value="{{$kur->semester}}">
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

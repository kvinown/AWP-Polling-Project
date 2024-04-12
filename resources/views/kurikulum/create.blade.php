@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-kurikulum')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger">
                    {{implode('', $errors->all(':message'))}}
                </div>
            @endif
            <div class="card p-4">
                <form action="{{route('kurikulum-store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id">ID Kurikulum</label>
                            <input class="my-2 form-control" type="text" name="id" id="id" placeholder="ID Kurikulum" required autofocus maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun Kurikulum</label>
                            <input class="my-2 form-control" type="number" name="tahun" id="tahun" placeholder="Tahun Kurikulum" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester Kurikulum</label>
                            <input class="my-2 form-control" type="number" name="semester" id="semester" placeholder="Semester Kurikulum" autofocus>
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

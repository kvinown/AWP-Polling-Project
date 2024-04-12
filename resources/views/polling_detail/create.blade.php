@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-polling_detail')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger">
                    {{implode('', $errors->all(':message'))}}
                </div>
            @endif
            <div class="card p-4">
                <form action="{{route('polling_detail-store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id">ID Polling Detail</label>
                            <input class="my-2 form-control" type="text" name="id" id="id" placeholder="ID Polling Detail" required autofocus maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="id_user">ID User</label>
                            <input class="my-2 form-control" type="text" name="id_user" id="id_user" placeholder="ID User" autofocus maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="id_mata_kuliah">ID Mata Kuliah</label>
                            <input class="my-2 form-control" type="text" name="id_mata_kuliah" id="id_mata_kuliah" placeholder="ID Mata Kuliah" autofocus maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="id_polling">ID Polling</label>
                            <input class="my-2 form-control" type="text" name="id_polling" id="id_polling" placeholder="ID Polling" autofocus maxlength="10">
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

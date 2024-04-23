@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-polling')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger">
                    {{implode('', $errors->all(':message'))}}
                </div>
            @endif
            <div class="card p-4">
                <form action="{{route('polling-store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        {{-- ID Polling --}}
                        <div class="form-group">
                            <label for="id">ID Polling</label>
                            <input class="my-2 form-control" type="text" name="id" id="id" placeholder="ID Polling" required autofocus maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="nama">Periode</label>
                            <input class="my-2 form-control" type="text" name="nama" id="nama" placeholder="Periode" autofocus maxlength="100">
                        </div>
                        <div class="form-group">
                            <label for="started_date">Tanggal Mulai</label>
                            <input class="my-2 form-control" type="date" name="started_date" id="started_date" placeholder="Tanggal Mulai" autofocus maxlength="100">
                        </div>
                        <div class="form-group">
                            <label for="ended_date">Tanggal Akhir</label>
                            <input class="my-2 form-control" type="date" name="ended_date" id="ended_date" placeholder="Tanggal Akhir" autofocus maxlength="100">
                        </div>
                        {{-- Status --}}
                        <div class="form-group">
                            <label>Status Polling:</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="1" name="status" id="status1">
                                <label class="form-check-label" for="status1">Aktif</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="0" name="status" id="status2">
                                <label class="form-check-label" for="status2">Non Aktif</label>
                            </div>
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

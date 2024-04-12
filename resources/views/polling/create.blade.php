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
                        <div class="form-group">
                            <label for="id">ID Polling</label>
                            <input class="my-2 form-control" type="text" name="id" id="id" placeholder="ID Polling" required autofocus maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="status">Status Polling</label>
                            <input class="my-2 form-control" type="text" name="status" id="status" placeholder="Status Polling" autofocus maxlength="100">
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

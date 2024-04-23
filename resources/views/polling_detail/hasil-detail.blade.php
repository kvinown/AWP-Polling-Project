@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    @include('layouts.header-hasil')
    <!-- End Header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="row d-flex">
                    <h5 class="card-title col-md">Data Detail Hasil</h5>
                </div>
                <table class="mt-2 table table-bordered" width="100%">
                    <thead class="border border-dark">
                    <tr>
                        <th scope="col">ID Polling Detail</th>
                        <th scope="col">Nama</th>
                    </tr>
                    </thead>
                    <tbody class="border border-dark">
                    @foreach($pollingDetails as $pollingDetail)
                        <tr>
                            <td>{{$pollingDetail->id}}</td>
                            <td>{{$pollingDetail->User->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

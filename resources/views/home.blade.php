@extends('layouts.master')

@section('web-content')
    <!-- Header -->
    {{--    @include('layouts.header-home')--}}
    <!-- End Header -->
    <section class="content home">
        <div class="container">
            <div class="row text-dark justify-content-between cont">
                <div class="col-md-5 bg-light p-3 border border-dark rounded-1">
                    <h1>Vision</h1>
                    <h5>
                        Maranatha Christian University becomes an independent and self-supporting institution of higher education which explores and instills knowledge in all areas of arts and sciences, motivated by the love and living examples of
                        Jesus Christ
                    </h5>
                </div>
                <div class="col-md-5 bg-light p-3 border border-dark rounded-1">
                    <h1>Mission</h1>
                    <h5>To educate competent scholars, create a conducive atmosphere, and practise Christian values as an effort to develop science, technology, and art in line with carrying out the three-fold purpose of higher education.</h5>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css-home')
    <style>
        body {
            background-image: url("img/BG PWL.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            position: relative;
            height: 100vh; /* Set tinggi badan menjadi tinggi viewport */
            margin: 0; /* Hilangkan margin bawaan */
            padding: 0; /* Hilangkan padding bawaan */
        }

        .home {
            margin-top: 300px; /* Turunkan class home sebesar 300px */
        }

        footer {
            position: absolute; /* Jadikan posisi absolut untuk footer */
            bottom: 0; /* Tempatkan footer di bagian bawah */
            width: 100%; /* Buat footer lebar penuh */
        }
    </style>
@endsection

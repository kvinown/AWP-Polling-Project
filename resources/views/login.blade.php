@extends('layouts.master')

@section('web-content')
    <!-- Header -->
{{--    @include('layouts.header-home')--}}
    <!-- End Header -->
    <section class="content">
        <div class="container">
            <div class="row d-block text-dark">
                <div class="col-md text-center">
                    <img
                        width="50%"
                        class="object-fit-cover"
                        src="https://blog-edutore-partner.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2020/05/03154745/Universitas-Kristen-Maranatha.jpg"
                        alt="" />
                </div>
                <div class="col-md d-flex">
                    <div class="col-md">
                        <h1>Vision</h1>
                        <h5>
                            Maranatha Christian University becomes an indpendent and self-supporting institution of higher education which explores and instills knowledge in all areas of arts and sciences, motivated by the love and living examples of
                            Jesus Christ
                        </h5>
                    </div>
                    <div class="col-md">
                        <h1>Mission</h1>
                        <h5>To educate competent scholars, create a conducive atmosphere, and practise christian values as an effort to develop science, technology, and art in line with carrying out the three-fold purpose of higher education.</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

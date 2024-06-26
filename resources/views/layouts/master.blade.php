<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1" />
    <title>Master</title>
    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <!-- Bootstrap Datepicker CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    @yield('css-home')
    <style>
        .footer-icon-size {
            font-size: 2em;
        }
        .content {
            min-height: calc(100vh - 250px);
        }
        .nav-height {
            min-height: 60px;
        }
        .footer-height {
            min-height: 130px;
        }
        .design {
            background-color: #D9D9D9;
            border-radius: 15px;
            padding: 20px;
            margin-top: 200px;
            margin-bottom: 20px;
        }
        h6 {
            margin: 0;
        }

        ul {
            padding-inline-start: 20px;
        }
        .login-button {
            width: 200px    ;
            position: absolute; /* Positions button absolutely within the content section */
            bottom: 20px; /* Adjust vertical position as needed based on your image */
            right: 20px; /* Adjust horizontal position as needed based on your image */
            /* Add other styles for the button (size, border, etc.) */
        }
    </style>
</head>
<body>
<!-- Navbar -->
@include('layouts.navbar')
<!-- End Navbar -->

@if(session('success'))
    <div class="position-fixed top-10 start-50 translate-middle" style="z-index: 11">
        <div id="toast" class="toast align-items-center text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

<!-- Content -->
@yield('web-content')
<!-- End Content -->

<!-- Footer -->
@include('layouts.footer')
<!-- End Footer -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<!-- jQuery (required for Bootstrap Datepicker) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap Datepicker JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    // Inisialisasi toast menggunakan JavaScript
    var toastEl = document.getElementById('toast');
    var toast = new bootstrap.Toast(toastEl);

    // Tampilkan toast jika session success ada
    if ("{{ session('success') }}") {
        toast.show();
    }
</script>

</body>
</html>

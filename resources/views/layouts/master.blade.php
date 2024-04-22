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
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
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
            margin-top: 440px;
            margin-bottom: 20px;
        }
        h6 {
            margin: 0;
        }

        ul {
            padding-inline-start: 20px;
        }
         .content {
             background-image: url("img/BG PWL.png");
             background-size: cover; /* Ensures image covers the entire container */
             background-repeat: no-repeat; /* Prevents image tiling */
             background-position: center; /* Centers image horizontally */
             position: relative; /* Allows absolute positioning of elements within */
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
</body>
</html>

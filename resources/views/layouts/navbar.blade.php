<nav class="nav-height navbar navbar-expand-lg bg-primary text-light navbar-dark">
    <div class="container">
        <a
            class="navbar-brand"
            href="#"
        >{{Auth::user()->name}}</a
        >
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div
            class="collapse navbar-collapse"
            id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a
                    class="nav-link active"
                    aria-current="page"
                    href="{{route('home')}}"
                >Home</a
                >
                <a
                    class="nav-link active"
                    href="{{route('matakuliah-index')}}"
                >Polling Mata Kuliah</a
                >
                <a
                    class="nav-link active"
                    href="{{route('fakultas-index')}}"
                >Fakultas</a
                >
                <a
                    class="nav-link active"
                    href="{{route('programstudi-index')}}"
                >Program Studi</a
                >
                <a
                    class="nav-link active"
                    href="#"
                >Hasil</a
                >
            </div>
        </div>
    </div>
</nav>

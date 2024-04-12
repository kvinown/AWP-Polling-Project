<nav class="nav-height navbar navbar-expand-lg bg-primary text-light navbar-dark my-auto">
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
            <div class="navbar-nav ms-auto my-auto">
                <a
                    class="nav-link active mx-1"
                    aria-current="page"
                    href="{{route('home')}}"
                >Home</a
                >
                <a
                    class="nav-link active mx-1"
                    href="{{route('matakuliah-index')}}"
                >Polling Mata Kuliah</a
                >
                <a
                    class="nav-link active mx-1"
                    href="{{route('fakultas-index')}}"
                >Fakultas</a
                >
                <a
                    class="nav-link active mx-1"
                    href="{{route('programstudi-index')}}"
                >Program Studi</a
                >
                <a
                    class="nav-link active mx-1"
                    href="{{route('kurikulum-index')}}"
                >Kurikulum</a
                >
                <a
                    class="nav-link active mx-1"
                    href="{{route('user-index')}}"
                >User</a
                >
                <a
                    class="nav-link active mx-1"
                    href="{{route('role-index')}}"
                >Role</a
                >
                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="nav-icon fa fa-sign-out"></i> Logout
                    </button>
                </form>

            </div>
        </div>
    </div>
</nav>

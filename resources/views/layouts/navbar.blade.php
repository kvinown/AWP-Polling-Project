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
                    href="{{route('polling-index')}}"
                >Polling Mata Kuliah</a
                >
                @if(auth()->user()->id_role == '1')
                <div class="dropdown">
                    <a class="nav-link active mx-1 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('pollingdetail-index') }}">Hasil</a></li>
                        <li><a class="dropdown-item" href="{{ route('fakultas-index') }}">Fakultas</a></li>
                        <li><a class="dropdown-item" href="{{ route('programstudi-index') }}">Program Studi</a></li>
                        <li><a class="dropdown-item" href="{{ route('kurikulum-index') }}">Kurikulum</a></li>
                        <li><a class="dropdown-item" href="{{ route('matakuliah-index') }}">Mata Kuliah</a></li>
                        <li><a class="dropdown-item" href="{{ route('user-index') }}">User</a></li>
                        <li><a class="dropdown-item" href="{{ route('role-index') }}">Role</a></li>
                    </ul>
                </div>
                @endif
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

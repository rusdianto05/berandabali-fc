<div class="fixed-top w-100">
    <nav class="navbar navbar-expand-lg position-absolute w-100">
        <div class="container-fluid px-4 px-xl-5">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('/assets/frontend/images/logo.svg') }}" width="50" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto my-4 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('/.*', '') ? ' active' : '' }}" aria-current="page"
                            href="/">Beranda</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ request()->routeIs('profile-klub.*', 'profile-klub') ? ' active' : '' }}"
                            href="{{ url('profile-klub') }}">Profil
                            Klub</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ request()->routeIs('team.*', 'team') ? ' active' : '' }}"
                            href="{{ url('team') }}">Tim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('match.*', 'match') ? ' active' : '' }}"
                            href="{{ url('match') }}">Pertandingan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('galery.*', 'galery') ? ' active' : '' }}"
                            href="{{ url('galery') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('article.*', 'article') ? ' active' : '' }}"
                            href="{{ url('article') }}">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('merchandise.*', 'merchandise') ? ' active' : '' }}"
                            href="{{ url('merchandise') }}">Merchandise</a>
                    </li>
                </ul>
                <div class="d-flex gap-3 align-items-center justify-content-center justify-content-lg-end">
                    <a href="{{ url('register') }}" class="btn_blue">Register</a>
                    <a href="{{ url('login') }}" class="btn_blue active">Login</a>
                </div>
            </div>
        </div>
    </nav>
</div>

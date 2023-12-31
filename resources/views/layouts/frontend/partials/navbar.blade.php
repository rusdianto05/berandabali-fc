<div class="fixed-top w-100">
    <nav class="navbar navbar-expand-lg position-absolute w-100">
        <div class="container">
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
                        <a class="nav-link {{ request()->routeIs('home') ? ' active' : '' }}" aria-current="page"
                            href="/">Beranda</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ request()->routeIs('user.profile.*') ? ' active' : '' }}"
                            href="{{ url('profile-klub') }}">Profil
                            Klub</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ request()->routeIs('user.team.*') ? ' active' : '' }}"
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
                    @guest('users')
                        <a href="{{ route('register.user') }}" class="btn_blue">Register</a>
                        <a href="{{ route('login.user') }}" class="btn_blue active">Login</a>
                    @else
                        {{-- show avatar and dropdown  --}}
                        <div class="dropdown">
                            <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset(Auth::guard('users')->user()->avatar ?? '/assets/frontend/images/icons/profile.svg') }}"
                                    class="rounded-circle" style="object-fit: cover" width="40" height="40" alt="" />
                                {{-- <span class="ms-2 text-black">{{ Auth::guard('users')->user()->name }}</span> --}}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <li class="menu_dropdown mb-1"><a class="dropdown-item d-flex gap-2 align-items-center"
                                        href="{{ route('profile.show') }}">
                                        <img src="{{ asset('/assets/frontend/images/icons/profile-fill.svg') }}"
                                            width="14" />
                                        <p class="mb-0">Profil Saya</p>
                                    </a></li>
                                <li class="menu_dropdown">
                                    <form action="{{ route('logout.user') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="dropdown-item text_primary d-flex gap-2 align-items-center">
                                            <img src="{{ asset('/assets/frontend/images/icons/logout.svg') }}"
                                                class="img_red" width="14" />
                                            <p class="mb-0 text_primary">Logout</p>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</div>

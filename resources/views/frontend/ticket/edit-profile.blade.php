@extends('layouts.frontend.master', ['title' => 'Tiket Saya'])
@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        body {
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
        }

        .title {
            font-family: var(--lilita) !important;
            font-size: 3rem;
            line-height: 125%;
        }

        /* End Jumbotron */

        /* New Match */
        #new_match {
            padding: 7rem 0;
        }

        h1 {
            font-size: 1.75rem !important;
            font-weight: 800;
            margin-bottom: 2rem;
        }

        .img_logo {
            width: 200px;
        }

        /* End New Match */

        /* Sidebar */
        .box_sidebar {
            background: #FFFFFF;
            border: 1px solid #EFEFEF;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
            border-radius: 15px;
            padding: 2rem;
        }

        .box_sidebar a,
        .box_sidebar button {
            display: block;
            color: #000000;
            font-weight: 600;
            padding-bottom: .5rem;
            margin-bottom: .875rem;
            border-bottom: 2px solid #EDEDED;
        }

        .profile_img {
            width: 5rem;
            height: 5rem;
            border-radius: 100%;
            object-fit: cover;
        }

        .box_sidebar .active p {
            color: var(--blue);
        }

        .box_sidebar .active img {
            filter: invert(54%) sepia(86%) saturate(4049%) hue-rotate(215deg) brightness(99%) contrast(94%);
        }

        /* End Sidebar */

        /* Modal */
        .modal-body p {
            font-size: .875rem;
        }

        .btn_logout {
            background-color: #e71345 !important;
            padding: .5rem 1.25rem;
            border-radius: 8px;
            color: #FFFFFF !important;
            font-size: .875rem;
            font-weight: 600;
            border: none !important;
            cursor: pointer;
            margin-bottom: 0 !important;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }

        .btn_cancel {
            background-color: white !important;
            padding: .5rem 1.25rem;
            border-radius: 8px;
            color: #e71345 !important;
            font-size: .875rem;
            font-weight: 600;
            border: none !important;
            cursor: pointer;
            box-shadow: none !important;
            margin-bottom: 0 !important;
        }

        .modal-footer {
            padding: .5rem !important;
        }

        .modal-header {
            padding: .75rem 1rem !important;
        }

        .modal-header h1 {
            font-size: 1.125rem !important;
        }

        /* End Modal */
        /* Profile */
        .btn_profile {
            background-color: #020050;
            color: white;
            border: none;
            padding: .5rem 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            font-size: .875rem;
            font-weight: 500;
        }

        .btn_profile:hover {
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        .profile_form label {
            font-size: .875rem;
            font-weight: 500;
            color: rgba(19, 20, 21, 0.5);
            letter-spacing: 0.00875rem;
        }

        .profile_form .form-control {
            border-radius: 8px !important;
            border: 1px solid #E9E9E9 !important;
            background: #FAFCFE !important;
            box-shadow: none !important;
            font-size: 0.875rem !important;
            padding: .8rem 1.25rem !important;
        }

        .profile_form {
            width: calc(100% - 200px);
        }

        .profile_img2 {
            width: 200px;
            height: 200px;
            position: relative;
            cursor: pointer;
        }

        .form-control:focus {
            border: 1px solid #020050 !important;
        }

        .profile_img2 img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 100%;
            overflow: hidden;
        }

        .img_edit {
            position: absolute;
            right: 0;
            width: 3rem !important;
            height: 3rem !important;
            padding: .5rem;
            background: #020050;
            bottom: 0;
        }

        /* End Profile */
        .button {
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 1rem;
            z-index: 99;
            box-shadow: 0 0 5px #7f89a1!important;
        }
        .button p {
            font-size: .75rem;
        }
        .button a {
            color: black !important;
        }
        .button .active p {
            color: var(--blue);
        }
        .button .active img {
            filter: invert(54%) sepia(86%) saturate(4049%) hue-rotate(215deg) brightness(99%) contrast(94%);
        }

        table.dataTable td, table.dataTable th {
            font-size: .875rem !important;
        }

        /* Responsiveness */
        @media only screen and (max-width: 1199.98px) {
            #new_match {
                padding: 6rem 0;
            }
            h1 {
                font-size: 1.5rem !important;
            }
            .profile_img2 {
                width: 170px;
                height: 170px;
            }
            .box_sidebar  p {
                font-size: .875rem;
            }
        }
        /* End Responsiveness */
    </style>
@endpush
@section('content')
    <!-- New Match -->
    <section id="new_match" style="background-color: #FFFFFF">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-3 d-none d-md-block">
                    <div class="box_sidebar">
                        <div class="d-flex flex-column gap-2 justify-content-center mb-4 text-center align-items-center">
                            <img src="{{ asset(Auth::guard('users')->user()->avatar ?? '/assets/frontend/images/icons/profile.svg') }}"
                                class="profile_img" />
                            <p class="text-dark fw-bold">{{ Auth::guard('users')->user()->name }}</p>
                        </div>
                        <a href="{{ route('profile.show') }}">
                            <div class="d-flex gap-3 align-items-center">
                                <img src="{{ asset('/assets/frontend/images/icons/edit-profile.svg') }}" width="20" />
                                <p class="mb-0">Profil Saya</p>
                            </div>
                        </a>
                        <a href="{{ route('user.ticket.index') }}">
                            <div class="d-flex gap-3 align-items-center">
                                <img src="{{ asset('/assets/frontend/images/icons/transaction.svg') }}" width="20" />
                                <p class="mb-0">Tiket Saya</p>
                            </div>
                        </a>
                        <button data-bs-toggle="modal" data-bs-target="#logoutModal"
                            class="d-flex gap-3 align-items-center w-100 px-1 border-0 bg-transparent">
                            <img src="{{ asset('/assets/frontend/images/icons/logout.svg') }}" class="img_red"
                                width="20" />
                            <p class="mb-0 text_primary">Logout</p>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin logout dari akun ini? Semua sesi yang sedang aktif akan
                                            ditutup dan Anda harus masuk kembali untuk mengaksesnya.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn_cancel" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('logout.user') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn_logout">
                                                Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 ps-lg-5 col-md-7">
                    <h1>Edit Profil</h1>
                    <div class="d-flex flex-column flex-lg-row gap-3 gap-md-4 gap-lg-5">
                        <form action="{{ route('profile.update', Auth::guard('users')->user()->id) }}" class="profile_form w-100 order-last order-lg-first"
                            method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <x-alert.alert-validation />
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="fullname" name="name"
                                    value="{{ Auth::guard('users')->user()->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ Auth::guard('users')->user()->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="phone" class="form-control" id="phone" name="phone"
                                    value="{{ Auth::guard('users')->user()->phone }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                            </div>
                            <button class="btn_profile mt-4" type="submit">Simpan Perubahan</button>
                            <input type="file" id="photo_profile" class="d-none" name="avatar">
                        </form>
                        <div class="text-center">
                            <label for="photo_profile" class="profile_img2 mb-4 mx-auto">
                                <img
                                    src="{{ asset(Auth::guard('users')->user()->avatar ?? '/assets/frontend/images/icons/profile.svg') }}" />
                                <img src="{{ asset('/assets/frontend/images/icons/edit.svg') }}" class="img_edit"
                                    alt="">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white button d-md-none">
            <div class="row">
                <div class="col-4">
                    <a href="{{ route('profile.show') }}">
                        <div class="text-center">
                            <img src="{{ asset('/assets/frontend/images/icons/edit-profile.svg') }}" width="16"/>
                            <p class="mb-0">Profil Saya</p>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{ route('user.ticket.index') }}">
                        <div class="text-center">
                            <img src="{{ asset('/assets/frontend/images/icons/transaction.svg') }}" width="16"/>
                            <p class="mb-0">Tiket Saya</p>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <button data-bs-toggle="modal" data-bs-target="#logoutModal" class="text-center w-100 px-1 border-0 bg-transparent">
                        <img src="{{ asset('/assets/frontend/images/icons/logout.svg') }}" class="img_red" width="16"/>
                        <p class="mb-0 text_primary">Logout</p>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- End New Match -->
@endsection
@push('js')
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
@endpush

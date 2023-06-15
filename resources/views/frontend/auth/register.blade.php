@extends('layouts.frontend.master', ['title' => 'Register'])
@push('css')
    <style>
        body {
            background: url("/assets/frontend/images/bg_login.png");
            width: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        #register {
            min-height: 100vh;
            padding: 6.5rem 0 5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.875rem;
        }

        .box_register {
            background: #ffffff;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 1.25rem;
            max-width: 60rem;
            width: 100%;
        }

        .btn_submit {
            width: 100%;
            background: #6276f6;
            border: 1px solid rgba(0, 0, 0, 0.15);
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.06);
            border-radius: 7px;
            color: white;
            padding: 0.75rem 2rem;
            font-weight: 600;
            font-size: 1rem;
        }

        h4,
        h2 {
            font-weight: 700 !important;
            color: #3d3d3d;
        }

        h2 {
            font-size: 1.75rem !important;
        }

        h4 {
            font-size: 1.25rem !important;
        }

        p,
        label {
            line-height: 170.3%;
            font-weight: 500;
        }

        p {
            color: #3d3d3d;
        }

        label {
            color: rgba(30, 27, 28, 0.8);
            letter-spacing: 0.005em;
        }

        a.text_blue {
            color: #6276f6;
            font-weight: 700;
        }

        a.text_blue:hover {
            text-decoration: underline !important;
        }

        .box_shadow {
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }

        .box_shadow img {
            width: 400px;
        }

        @media only screen and (min-width: 768px) and (max-width: 991.98px) {
            .box_shadow img {
                width: 100%;
            }
        }

        @media only screen and (max-width: 767.98px) {
            .box_register {
                max-width: 28rem;
                display: flex !important;
                justify-content: center !important;
            }
        }
    </style>
@endpush
@section('content')
    <!-- Register -->
    <section id="register">
        <div class="container">
            <div class="box_register mx-auto">
                <div class="row align-items-center">
                    <div class="col-md-6 p-4 p-md-5 text-center d-none d-md-block">
                        <div class="image">
                            <img src="/assets/frontend/images/register.svg" width="100%" alt="" />
                        </div>
                        <h4 class="mb-3">Beranda Bali Football Club</h4>
                        <p>
                            Lorem ipsum dolor sit amet consectetur. Leo bibendum in ut ut sagittis donec amet. At
                            est urna consequat id velit. Turpis hac massa platea odio phasellus dictum amet nunc ut.
                            Id ut.
                        </p>
                    </div>
                    <div class="col-md-6 p-5 box_shadow">
                        <h2 class="mb-3 text-center text-md-start">Register</h2>
                        <p class="mb-4 text-center text-md-start">
                            Lengkapi data diri di bawah ini sebelum masuk ke website Bali Football Club dengan
                            benar.
                        </p>
                        <x-alert.alert-validation />
                        <form action="{{ route('user_register') }}" method="POST" class="mb-4">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="mb-1">Nama</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }} " />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="mb-1">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="mb-1">Nomor Telepon</label>
                                <input type="phone" name="phone" id="phone" class="form-control"
                                    value="{{ old('phone') }}" />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="mb-1">Password</label>
                                <input type="password" name="password" id="password" class="form-control" />
                            </div>
                            <div class="mb-5">
                                <label for="password_confirmation" class="mb-1">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" />
                            </div>
                            <button type="submit" class="btn_submit">Register</button>
                        </form>
                        <p class="text-center mt-3 mb-0">
                            Sudah punya akun? <a class="text_blue" href="{{ route('login.user') }}">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Register -->
@endsection

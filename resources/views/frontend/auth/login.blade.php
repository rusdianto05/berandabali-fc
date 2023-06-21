@extends('layouts.frontend.master', ['title' => 'Login'])
@push('css')
    <style>
        body {
            background: url("/assets/frontend/images/bg_login.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        #login {
            min-height: 100vh;
            padding: 2.5rem 0 5rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box_login {
            background: #ffffff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            border-radius: 1.25rem;
            max-width: 30rem;
            width: 100%;
            font-size: 1rem;
        }

        .btn_google {
            width: 100%;
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 5px;
            padding: 0.5rem 2rem;
            color: rgba(30, 27, 28, 0.8);
            font-size: 1rem;
        }

        .or_hr {
            position: relative;
            color: rgba(0, 0, 0, 0.35);
        }

        .or_hr::before {
            position: absolute;
            content: "";
            height: 2px;
            background-color: rgba(0, 0, 0, 0.15);
            width: 45%;
            left: 0;
            top: 50%;
        }

        .or_hr::after {
            position: absolute;
            content: "";
            height: 2px;
            background-color: rgba(0, 0, 0, 0.15);
            width: 45%;
            right: 0;
            top: 50%;
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
        }

        a.text_blue {
            color: #2f66fe;
            font-weight: 600;
        }

        a.text_blue:hover {
            text-decoration: underline !important;
        }

        h2 {
            font-weight: 700 !important;
            font-size: 1.75rem !important;
        }

        p,
        label {
            line-height: 170.3%;
            font-weight: 500;
        }

        p {
            color: #55565b;
        }

        p,
        label,
        input {
            font-size: 0.875rem;
        }

        label {
            color: rgba(30, 27, 28, 0.8);
            letter-spacing: 0.005em;
        }

        @media only screen and (max-width: 991.98px) {
            .box_login {
                max-width: 28rem;
            }
        }
    </style>
@endpush
@section('content')
    <!-- Login -->
    <section id="login">
        <div class="container">
            <div class="box_login p-4 p-sm-5 mx-auto">
                <div class="text-center">
                    <h2 class="mb-4">Login</h2>
                    <p>Selamat datang kembali, silahkan lengkapi data berikut untuk mengakses akun Anda!</p>
                </div>
                {{-- <button class="d-flex gap-3 my-4 justify-content-center align-items-center btn_google">
                    <img src="/assets/frontend/images/icons/google.svg" alt="" />
                    <p class="mb-0">Login dengan google</p>
                </button> --}}
                <form action="{{ route('user.authenticate') }}" method="POST" class="mb-3" autocomplete="off">
                    @csrf
                    <div class="my-4">
                        {{-- <p class="text-center or_hr"></p> --}}
                        <x-alert.alert-validation />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="mb-1">Email</label>
                        <input type="email" id="email" name="email" class="form-control" />
                    </div>
                    <div class="mb-5">
                        <label for="password" class="mb-1">Password</label>
                        <input type="password" id="password" name="password" class="form-control" />
                    </div>
                    <button type="submit" class="btn_submit">Login</button>
                </form>
                <p>Belum punya akun? <a href="{{ route('register.user') }}" class="text_blue">Register</a></p>
            </div>
        </div>
    </section>
    <!-- End Login -->
@endsection

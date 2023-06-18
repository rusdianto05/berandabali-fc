@extends('layouts.frontend.master', ['title' => 'Pembayaran Berhasil'])
@push('css')
    <style>
        body {
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
            min-height: 100vh;
            width: 100%;
            background-repeat: no-repeat;
        }

        #checkout {

            /* background: #ffffff; */
            padding: 6.5rem 0 6rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box_checkout {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.14);
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            width: 100%;
        }

        .btn_submit {
            width: 100%;
            background: #ffd232;
            box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.17);
            border-radius: 20px;
            color: white;
            padding: 0.75rem 2rem;
            font-weight: 600;
            font-weight: 800;
            font-size: 1.125rem;
            border: none;
        }

        h4,
        h2 {
            font-weight: 700 !important;
            color: black;
        }

        h2 {
            font-size: 1.25rem !important;
        }

        p,
        label {
            line-height: 170.3%;
            font-weight: 500;
        }

        p {
            color: black;
            font-size: 1.125rem;
        }

        label {
            color: rgba(30, 27, 28, 0.8);
            letter-spacing: 0.005em;
        }

        label,
        input {
            font-size: 0.875rem;
        }

        .box_shadow {
            background: #ffffff;
            /* add rounded card */
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, 0.14);
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .box_shadow img {
            width: 400px;
        }

        .right_side {
            padding: 4rem;
        }

        .accordion-button:not(.collapsed) {
            background: #ececec !important;
            border: 1px solid rgba(0, 0, 0, 0.1) !important;
            border-radius: 5px !important;
            color: black !important;
            box-shadow: none !important;
        }

        .accordion-button {
            box-shadow: none !important;
            filter: invert(0%) sepia(3%) saturate(0%) hue-rotate(235deg) brightness(99%) contrast(105%);
        }
    </style>
@endpush
@section('content')
    <!-- Register -->
    <section id="checkout" class="container">
        <div class="col-md-6 p-5 text-center box_shadow">
            <img src="{{ asset('/assets/frontend/images/payment_success.jpg') }}" alt="" />
            <p class="mt-5">
                Pembayaran Berhasil <br />
                <a href="{{ route('home') }}" class="btn btn_submit mt-5">Kembali ke Halaman Utama</a>
            </p>
        </div>
    </section>
    <!-- End Register -->
@endsection

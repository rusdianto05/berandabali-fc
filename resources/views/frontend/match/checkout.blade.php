@extends('layouts.frontend.master', ['title' => 'Checkout'])
@push('css')
    <style>
        body {
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
            min-height: 100vh;
            width: 100%;
            background-repeat: no-repeat;
        }

        #checkout {
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
        <div class="box_checkout">
            <div class="row">
                <div class="col-md-6 p-5 text-center box_shadow">
                    <img src="{{ asset('/assets/frontend/images/checkout_vector.svg') }}" alt="" />
                    <p class="mt-5">
                        Silahkan periksa kelengkapan <br />
                        tiket Anda sebelum melakukan pembayaran!
                    </p>
                </div>
                <div class="col-md-6 right_side">
                    {{-- <form action="{{ route('checkout.store') }}" method="POST"> add param team_match --}}
                    <form action="{{ route('checkout.store', ['team_match_id' => request()->team_match_id]) }}"
                        method="POST">
                        @csrf
                        <div class="mb-4">
                            <h2 class="mb-3">Identitas Pemesan</h2>
                            <div class="mb-3">
                                <label for="name" class="mb-1">Nama</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ @$user->name ?? old('name') }}" />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="mb-1">Nomor Telepon</label>
                                <input type="phone" id="phone" class="form-control" name="phone"
                                    value="{{ @$user->phone ?? old('phone') }}" />
                            </div>
                        </div>
                        <div class="mb-4">
                            <h2 class="mb-3">Detail Pesanan</h2>
                            <div class="accordion" id="accordionTicket">
                                @foreach ($tickets as $tiket)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Tiket {{ $tiket->ticket->name }}
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionTicket">
                                            <div class="accordion-body">
                                                <div class="mb-3">
                                                    <label for="name1" class="mb-1">Nama</label>
                                                    <input type="text" id="name1" class="form-control" name="names[]"
                                                        value="{{ @$user->name ?? old('name') }}" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="phone1" class="mb-1">Nomor Telepon</label>
                                                    <input type="phone" id="phone1" class="form-control"
                                                        name="phones[]" value="{{ @$user->phone ?? old('phone') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn_submit mt-5">Bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Register -->
@endsection

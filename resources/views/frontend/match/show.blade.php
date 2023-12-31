@extends('layouts.frontend.master', ['title' => 'Detail Pertandingan'])
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            color: white;
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
        }

        /* New Match */
        #new_match {
            padding: 6.5rem 0 6rem;
        }

        #new_match h1,
        #new_match h1 span,
        #ticket h1 {
            font-family: var(--lilita);
            font-size: 2.5rem !important;
        }

        .name_club {
            font-weight: 800 !important;
            font-size: 1.25rem;
            line-height: 150%;
            letter-spacing: 0.1em;
        }

        .img_logo {
            height: 200px;
        }

        .score_text,
        .score_text span {
            font-weight: 800 !important;
            font-size: 5rem;
        }

        .score_text span {
            padding: 0 1rem;
            color: #9fa0ab;
        }

        .date {
            font-weight: 700;
            color: #9fa0ab;
        }

        .btn_primary {
            position: absolute;
        }

        /* End New Match */

        /* Select ticket */
        #ticket {
            padding: 2rem 0 8rem;
        }

        #ticket h1 {
            margin-bottom: 3rem;
        }

        .box_ticket {
            background: #ffffff;
            border-radius: 8px;
            padding: 1.25rem 1rem;
        }

        .img_ticket {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
        }

        .box_ticket h6 {
            color: #0a1524;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .contents p {
            font-weight: 500;
            font-size: 0.875rem;
            color: #55565b;
        }

        .box_ticket h5 {
            color: #000000;
            font-size: 1.125rem;
            font-weight: 800;
        }

        .btn_select {
            width: 100%;
            color: white;
            border: none !important;
            background: #ffd232;
            box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.17);
            border-radius: 12px;
            padding: 0.5rem 2rem;
            font-weight: 800;
            font-size: 1.125rem;
        }

        .btn_add {
            width: 100%;
            color: white;
            border: none !important;
            background: #ffd232;
            box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.17);
            border-radius: 12px;
            padding: 0.5rem 2rem;
            font-weight: 800;
            font-size: 1rem
        }

        .btn_reduce {
            width: 100%;
            color: white;
            border: none !important;
            background: #ff0909;
            box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.17);
            border-radius: 12px;
            padding: 0.5rem 2rem;
            font-weight: 800;
            font-size: 1rem;

        }

        .fw-medium {
            font-weight: 500;
        }

        .btn_checkout {
            background: #ffd232;
            box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.17);
            border-radius: 20px;
            padding: 0.75rem 3rem;
            border: none;
            color: white;
            font-weight: 800;
            font-size: 1.5rem;
        }

        .amount table tr td {
            font-weight: 800;
            font-size: 1.5rem;
        }

        button.btn_amount {
            border: none;
            padding: 0.25rem 1rem;
            background-color: transparent !important;
            color: white;
        }

        button.btn_ticket {
            border: none;
            padding: 0.25rem 1rem;
            background-color: transparent !important;
            color: rgb(0, 0, 0);
        }

        input {
            width: 2rem;
            text-align: center;
            background-color: transparent !important;
            border: none;
            color: white;
        }

        .input {
            border: 2px solid #ffffff;
            border-radius: 3px;
            text-align: center;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            /* Untuk Firefox */
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            /* Untuk Chrome, Safari, dan Opera */
            margin: 0;
            /* Menghilangkan margin tambahan */
        }
        /* End Select ticket */

        /* Responsiveness */
        @media only screen and (max-width: 1199.98px) {
            .title {
                font-size: 2.5rem;
            }
            .img_ball {
                width: 450px;
            }
            #new_match h1, #new_match h1 span, #schedule h1, #schedule h1 span {
                font-size: 2.25rem !important;
            }
            .img_logo {
                height: 150px;
            }
            #new_match {
                padding: 6rem 0 4rem;
            }
            .score_text, .score_text span {
                font-size: 4rem;
            }
            .date,
            .text_sm,
            .text_content p {
                font-size: .875rem;
            }
            .badge_status,
            .box_ticket h5,
            .name_club {
                font-size: 1rem;
            }
            .box_ticket h6 {
                font-size: 1.125rem;
            }
            .contents p {
                font-size: .75rem;
            }
            .contents img {
                width: 1rem;
            }
            .img_ticket{
                height: 150px;
            }
            .amount table tr td,
            .btn_checkout {
                font-size: 1.25rem;
            }
            .btn_checkout {
                padding: .75rem 2rem;
                border-radius: .75rem;
            }
        }
        /* End Responsiveness */
    </style>
@endpush
@section('content')
    <!-- New Match -->
    <section id="new_match">
        <div class="container">
            <h1 class="text-center mb-5">DETAIL <span class="text_primary">PERTANDINGAN</span></h1>
            <div class="row gap-xl-4 pt-3 justify-content-center align-items-center">
                <div class="col-md-4 col-xl-3 mb-4 mb-md-0">
                    <div class="text-center">
                        <img src="{{ asset('assets\media\logos\sidebar-logo.png') }}" class="img_logo" alt="" />
                    </div>
                    <h2 class="mt-4 text-center name_club">
                        BerandaBali <br />
                        FOOTBALL CLUB
                    </h2>
                </div>
                <div class="col-md-4 col-xl-3 mb-4 mb-md-0 text-center">
                    <h2 class="score_text">{{ $match->team_score }} <span>:</span> {{ $match->opponent_score }}
                    </h2>
                    <p class="date">{{ date('d F Y', strtotime($match->match_date)) }} |
                        {{ date('H:i', strtotime($match->match_date)) }}</p>
                    <div class="d-flex gap-2 gap-lg-3 justify-content-center align-items-center mb-3 text_content">
                        <img src="/assets/frontend/images/icons/pin.svg" alt="" />
                        <p class="mb-0">{{ $match->match_location }}</p>
                    </div>
                    <div class="d-flex gap-2 gap-lg-3 justify-content-center align-items-center text_content">
                        <img src="/assets/frontend/images/icons/time.svg" alt="" />
                        <p class="mb-0">{{ date('H:i', strtotime($match->match_date)) }} -
                            {{ date('H:i', strtotime($match->match_date . ' + 2 hours')) }} WIB
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="text-center">
                        <img src="{{ asset($match->opponent_logo) }}" class="img_logo" alt="" />
                    </div>
                    <h2 class="mt-4 text-center name_club">
                        {{ $match->opponent_name }} <br />
                        FOOTBALL CLUB
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End New Match -->

    <!-- Select tikcet -->
    <section id="ticket">
        <div class="container">
            <h1 class="text-center text-md-start">PILIH TIKET</h1>
            <div class="row">
                @foreach ($match->tickets as $item)
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="box_ticket">
                        <img src="{{ asset($item->image) }}" class="img_ticket" alt="" />
                        <h6 class="my-3">{{ $item->name }}</h6>
                        <div class="mb-3 contents">
                            <div class="d-flex gap-3 align-items-center mb-2 mb-md-3">
                                <img src="/assets/frontend/images/icons/calendar.svg" alt="" />
                                <p class="mb-0">{{ date('d F Y', strtotime($item->teamMatch->match_date)) }}</p>
                            </div>
                            <div class="d-flex gap-3 align-items-center mb-2 mb-md-3">
                                <img src="/assets/frontend/images/icons/pin.svg" alt="" />
                                <p class="mb-0">{{ $item->teamMatch->match_location }}</p>
                            </div>
                            <div class="d-flex gap-3 align-items-center">
                                <img src="/assets/frontend/images/icons/time.svg" alt="" />
                                <p class="mb-0">{{ date('H:i', strtotime($item->teamMatch->match_date)) }} -
                                    {{ date('H:i', strtotime($item->teamMatch->match_date . ' + 2 hours')) }} WIB</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Rp {{ number_format($item->price) }}</h5>
                            <p class="text_primary mb-0 text_sm fw-medium">Sisa
                                {{ $item->quantity }}</p>
                        </div>
                        @if (Auth::guard('users')->user()->carts->where('ticket_id', $item->id)->count() > 0)
                            <div class="d-flex">
                                <form action="{{ route('match.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="ticket_id" value="{{ $item->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn_add"><i class="fas fa-plus"></i></button>
                                </form>
                                <div class="d-flex justify-content-between align-items-center mx-auto">
                                    <h5 class="mb-0">
                                        {{ Auth::guard('users')->user()->carts->where('ticket_id', $item->id)->count() }}
                                    </h5>
                                </div>
                                <form action="{{ route('match.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn_reduce"><i class="fas fa-minus"></i></button>
                                </form>
                            </div>
                        @else
                            <form action="{{ route('match.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $item->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn_select">Pilih</button>
                            </form>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between mt-4">
                <div class="amount mb-4 mb-md-0">
                    <table width="100%">
                        <tr>
                            <td>Jumlah</td>
                            <td>: {{ $total_quantity }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>:  Rp. {{ number_format($total_price) }}</td>
                        </tr>
                    </table>
                </div>
                <a href="{{ route('checkout.index', ['team_match_id' => $match->id]) }}" class="btn_checkout text-center">Checkout</a>
            </div>
        </div>
    </section>
    <!-- End Select tikcet -->
@endsection

@extends('layouts.frontend.master', ['title' => 'Pertandingan'])
@push('css')
    <style>
        body {
            color: white;
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
        }

        /* Jumbotron */
        #jumbotron {
            background: linear-gradient(180deg, #19184b 0%, #030226 100%);
            background-repeat: no-repeat;
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
        }

        .title {
            font-family: var(--lilita) !important;
            font-size: 3rem;
            line-height: 125%;
        }

        .subtitle {
            font-size: 1.125rem;
            font-weight: 600;
            letter-spacing: 0.005em;
            line-height: 153%;
        }

        .img_match {
            position: absolute;
            width: 60%;
            left: 0;
            bottom: -7.1375%;
        }

        .img_ball {
            position: absolute;
            left: -15rem;
            top: -5rem;
            width: 500px;
        }

        /* End Jumbotron */

        /* New Match */
        #new_match {
            padding: 7rem 0;
        }

        #new_match h1,
        #new_match h1 span,
        #schedule h1,
        #schedule h1 span {
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
            width: 200px;
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

        .badge_status {
            background: rgba(61, 164, 145, 0.5);
            border: 1.65846px solid #5cbaba;
            border-radius: 23.2184px;
            width: max-content;
            margin: 1.5rem auto;
            padding: 0.25rem 1rem;
            font-weight: 700;
            font-size: 1.125rem;
            color: #75e4e4;
        }

        .date {
            font-weight: 700;
            color: #9fa0ab;
        }

        .btn_primary {
            position: absolute;
        }

        /* End New Match */

        /* Schedule */
        #schedule {
            padding: 3rem 0 6rem;
        }

        #schedule h1 {
            margin-bottom: 3.5rem;
        }

        .box_schedule {
            background-color: #ffffff;
            background-image: url("/assets/frontend/images/schedule_bg.svg");
            padding: 1rem;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 25px;
            width: 100%;
            margin-bottom: 2.25rem;
        }

        .image {
            width: 80px;
        }

        .box_schedule h2 {
            font-family: var(--lilita);
            color: #1e1b1c;
            letter-spacing: 0.06em;
            font-size: 1.5rem;
        }

        .box_schedule p {
            font-weight: 500;
            color: #55565b;
            font-size: 0.875rem;
        }

        .border_bottom {
            border-bottom: 2px solid #9fa0ab;
        }

        .text_red {
            color: #e71345 !important;
        }

        a p {
            letter-spacing: 0.05em;
            font-weight: 600 !important;
        }

        /* End Schedule */
    </style>
@endpush
@section('content')
    <!-- Jumbotron -->
    <section id="jumbotron" class="container-fluid px-5">
        <div class="img_match">
            <img src="/assets/frontend/images/match.png" width="100%" alt="" />
        </div>
        <div class="img_ball">
            <img src="/assets/frontend/images/icons/ball.svg" width="100%" alt="" />
        </div>
        <div class="ms-auto w-50">
            <h1 class="title">
                BERANDA BALI <br />
                FOOTBALL CLUB
            </h1>
            <p class="subtitle mt-3 mb-5">
                Pertandingan yang akan diikuti oleh Beranda Bali FC dan hasil pertandingan terbaru dari Beranda Bali FC
                akan ditampilkan pada halaman ini beserta dengan jadwal pertandingan selanjutnya.
            </p>
            <a href="#schedule" class="btn_primary">Lihat lebih banyak</a>
        </div>
    </section>
    <!-- End Jumbotron -->

    <!-- New Match -->
    <section id="new_match" class="container-fluid px-5">
        <h1 class="text-center mb-5">HASIL PERTANDINGAN <span class="text_primary">TERBARU</span></h1>
        <div class="row gap-4 pt-4 justify-content-center align-items-center">
            <div class="col-md-3">
                <div class="text-center">
                    <img src="{{ asset('assets\media\logos\sidebar-logo.png') }}" class="img_logo" alt="" />
                </div>
                <h2 class="mt-4 text-center name_club">
                    BerandaBali <br />
                    FOOTBALL CLUB
                </h2>
            </div>
            <div class="col-md-3 text-center">
                <h2 class="score_text">{{ $latest_match->team_score }} <span>:</span> {{ $latest_match->opponent_score }}
                </h2>
                <p class="badge_status">Selesai</p>
                <p class="date">{{ date('d F Y', strtotime($latest_match->match_date)) }} |
                    {{ date('H:i', strtotime($latest_match->match_date)) }}</p>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <img src="{{ asset($latest_match->opponent_logo) }}" class="img_logo" alt="" />
                </div>
                <h2 class="mt-4 text-center name_club">
                    {{ $latest_match->opponent_name }} <br />
                    FOOTBALL CLUB
                </h2>
            </div>
        </div>
    </section>
    <!-- End New Match -->

    <!-- Schedule -->
    <section id="schedule" class="container-fluid px-5">
        <h1 class="text-center">JADWAL <span class="text_primary">PERTANDINGAN</span></h1>
        <div class="row">
            @foreach ($next_match as $match)
                <div class="col-md-4 col-xl-3">
                    <div class="box_schedule">
                        <img src="{{ asset($match->opponent_logo) }}" class="image" alt="" />
                        <h2 class="my-3">{{ $match->opponent_name }}</h2>
                        <div class="border_bottom pb-3 mb-3">
                            <div class="d-flex gap-3 align-items-center mb-3">
                                <img src="/assets/frontend/images/icons/calendar.svg" alt="" />
                                <p class="mb-0">{{ date('d F Y', strtotime($match->match_date)) }}</p>
                            </div>
                            <div class="d-flex gap-3 align-items-center mb-3">
                                <img src="/assets/frontend/images/icons/pin.svg" alt="" />
                                <p class="mb-0">{{ $match->match_location }}</p>
                            </div>
                            <div class="d-flex gap-3 align-items-center">
                                <img src="/assets/frontend/images/icons/time.svg" alt="" />
                                <p class="mb-0">{{ date('H:i', strtotime($match->match_date)) }} -
                                    {{ date('H:i', strtotime($match->match_date . ' + 2 hours')) }} WIB</p>
                            </div>
                        </div>
                        <a href="{{ route('match.show', $match->id) }}">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="text_red mb-0">Beli tiket sekarang!</p>
                                <img src="/assets/frontend/images/icons/arrow-red.svg" alt="" />
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- End Schedule -->
@endsection

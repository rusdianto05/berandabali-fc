@extends('layouts.frontend.master', ['title' => 'Team'])
@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap");

        body {
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
            background-repeat: no-repeat;
        }

        /* jumbotron */
        #jumbotron {
            background: linear-gradient(180deg, #19184b 0%, #030226 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            padding: 6.5rem 0;
            position: relative;
            text-align: center;
        }

        .img_jumbotron {
            position: absolute;
            bottom: -10.12%;
            right: 0;
            left: 0;
            width: 70%;
            margin: auto;
        }

        .img_jumbotron img {
            width: 100%;
        }

        #jumbotron h1 {
            font-family: var(--lilita);
            font-size: 9rem;
            color: rgba(255, 255, 255, 0);
            -webkit-text-stroke: 6px #ffffff;
            opacity: 0.6;
        }

        /* end jumbotron */

        /* player */
        #player {
            padding: 8rem 0 4rem;
            position: relative;
            overflow: hidden;
        }

        .team-slider .slick-slide {
            opacity: 0.5;
            transition: opacity 0.3s;
            padding-left: 1rem;
            padding-right: 1rem;
            transform: scale(0.6);
            margin: 4rem 0;
        }

        .team-slider .slick-slide.slick-cloned {
            opacity: 0.5;
            transition: opacity 0.3s;
            transform: scale(0.6);
        }

        .team-slider .slick-slide.slick-cloned .name,
        .team-slider .slick-slide .name {
            visibility: hidden;
        }

        .team-slider .slick-slide.slick-cloned .nomor,
        .team-slider .slick-slide .nomor {
            bottom: -3rem;
            top: auto;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .team-slider .slick-slide.slick-current.slick-active .name {
            visibility: visible;
        }

        .team-slider .slick-slide.slick-current.slick-active .nomor {
            top: 60%;
        }

        .team-slider .slick-slide.slick-current.slick-active {
            opacity: 1;
            transform: scale(0.95);
            transition: opacity 0.3s;
        }

        .image_player {
            -webkit-mask-image: url("/assets/frontend/images/bg_player.svg");
            mask-image: url("/assets/frontend/images/bg_player.svg");
            -webkit-mask-repeat: no-repeat;
            mask-repeat: no-repeat;
            width: 100%;
        }

        .image_player::before {
            content: "";
            position: absolute;
            bottom: -7rem;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("/assets/frontend/images/bg_player.svg");
            background-repeat: no-repeat;
            background-size: contain;
            z-index: -1;
        }

        .image_player img {
            height: 40rem;
            width: 100%;
            object-fit: cover;
            min-width: 22rem;
        }

        .box_player {
            position: relative !important;
            width: 100%;
        }

        .nomor h1 {
            font-weight: 600;
            font-size: 2.5rem;
            background: #fec02d;
            width: 4rem;
            height: 4rem;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            border-radius: 100%;
        }

        .nomor {
            position: absolute;
        }

        .name {
            position: absolute;
            bottom: -8rem;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .name h1 {
            font-weight: 900;
            color: white;
            font-size: 2.5rem;
            font-family: "Lato", sans-serif;
        }

        .name a {
            color: white;
            font-weight: 500;
            opacity: 0.7;
            font-size: 1.125rem;
        }

        .ball1,
        .ball2,
        .ball3 {
            position: absolute;
        }

        .ball1 {
            top: 15%;
            left: -15rem;
            z-index: -1;
            width: 400px;
        }

        .ball2 {
            top: -30%;
            right: -20%;
            width: 600px;
        }

        .ball3 {
            bottom: 2rem;
            width: 200px;
            right: -5rem;
        }

        .nav-link.nav-product {
            background-color: transparent !important;
            padding: 0.75rem 2rem !important;
            color: #6276f6 !important;
            border: 3px solid #6276f6 !important;
            border-radius: 10px !important;
            font-weight: 600 !important;
            font-size: 1.125rem;
        }

        .nav-tabs {
            display: flex !important;
            gap: 1rem !important;
        }

        .nav-link.nav-product.active {
            background-color: white !important;
            color: #0a1524 !important;
            border: 3px solid white !important;
            font-weight: 800 !important;
        }

        /* end player */
    </style>
@endpush
@section('content')
    <!-- Jumbotron -->
    <section id="jumbotron">
        <div class="container">
            <h1>
                BERANDA BALI <br />
                FOOTBALL CLUB
            </h1>
            <div class="img_jumbotron">
                <img src="/assets/frontend/images/jumbotron_tim.png" alt="" />
            </div>
        </div>
    </section>
    <!-- End Jumbotron -->

    <!-- Player -->
    <section id="player">
        <div class="container">
            <ul class="nav nav-tabs mb-0 d-flex justify-content-center border-bottom-0" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-product active" id="player-tab" data-bs-toggle="tab"
                        data-bs-target="#tab-player" type="button" role="tab" aria-controls="tab-player"
                        aria-selected="true">
                        Pemain
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-product" id="coach-tab" data-bs-toggle="tab"
                        data-bs-target="#coach-tab-pane" type="button" role="tab" aria-controls="coach-tab-pane"
                        aria-selected="false">
                        Pelatih
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-product" id="staff-tab" data-bs-toggle="tab"
                        data-bs-target="#staff-tab-pane" type="button" role="tab" aria-controls="staff-tab-pane"
                        aria-selected="false">
                        Staff
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-player" role="tabpanel" aria-labelledby="player-tab"
                    tabindex="0">
                    <div class="team-slider slider">
                        @foreach ($players as $player)
                            <div class="slide">
                                <div class="box_player">
                                    <div class="image_player">
                                        <img src="{{ $player->image }}" alt="" />
                                    </div>
                                    <div class="nomor">
                                        <h1>{{ $player->number }}</h1>
                                    </div>
                                    <div class="name">
                                        <h1 class="mb-3">{{ $player->name }}</h1>
                                        <a href="{{ route('user.team.show', $player->id) }}">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="coach-tab-pane" role="tabpanel" aria-labelledby="coach-tab" tabindex="0">
                    <div class="team-slider slider">
                        @foreach ($coaches as $coach)
                            <div class="slide">
                                <div class="box_player">
                                    <div class="image_player">
                                        <img src="{{ asset($coach->image) }}" alt="" />
                                    </div>
                                    <div class="nomor">
                                        <h1>{{ $coach->position }}</h1>
                                    </div>
                                    <div class="name">
                                        <h1 class="mb-3">{{ $coach->name }}</h1>
                                        <a href="{{ route('user.team.show', $coach->id) }}">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="staff-tab-pane" role="tabpanel" aria-labelledby="staff-tab" tabindex="0">
                    <div class="team-slider slider">
                        @foreach ($staffs as $staff)
                            <div class="slide">
                                <div class="box_player">
                                    <div class="image_player">
                                        <img src="{{ $staff->image }}" alt="" />
                                    </div>
                                    <div class="nomor">
                                        <h1>{{ $staff->position }}</h1>
                                    </div>
                                    <div class="name">
                                        <h1 class="mb-3">{{ $staff->name }}</h1>
                                        <a href="{{ route('user.team.show', $staff->id) }}">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <img src="/assets/frontend/images/icons/ball.svg" class="ball1" alt="" />
        <img src="/assets/frontend/images/icons/ball.svg" class="ball2" alt="" />
        <img src="/assets/frontend/images/icons/ball.svg" class="ball3" alt="" />
    </section>
    <!-- End Player -->
@endsection
@push('js')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".team-slider").slick({
                centerMode: true,
                centerPadding: "5px",
                dots: false,
                arrows: true,
                slidesToShow: 3,
                infinite: true,
                lazyLoad: "ondemand",
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            centerMode: false,
                        },
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                        },
                    },
                ],
            });
        });
    </script>
@endpush

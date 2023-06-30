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
            overflow-x: hidden;
        }

        /* jumbotron */
        #jumbotron {
            position: relative;
        }
        .logo-tim {
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
        }

        .jumbotron {
            background: linear-gradient(180deg, #19184b 0%, #030226 100%);
            margin-top: 4rem;
            height: 40rem;
            display: flex;
            justify-content: center;
            padding: 6.5rem 0;
            position: relative;
            text-align: center;
            overflow: hidden;
        }

        .img_jumbotron {
            position: absolute;
            bottom: -3rem;
            left: 50%;
            transform: translateX(-50%);
            width: 70%;
            margin: 0 auto;
        }


        .img_jumbotron img {
            width: 100%;
            z-index: 999;
        }

        .jumbotron h1 {
            font-family: var(--lilita);
            font-size: 9rem;
            color: rgba(255, 255, 255, 0);
            -webkit-text-stroke: 6px #ffffff;
            opacity: 0.6;
        }

        /* end jumbotron */

        /* player */
        #player {
            padding: 8rem 0 6rem;
            position: relative;
            overflow: hidden;
        }

        .team-slider .slick-slide {
            opacity: 0.5;
            transition: opacity 0.3s;
            padding-left: 1rem;
            padding-right: 1rem;
            transform: scale(0.6);
            margin: 4rem 0 10rem;
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
            bottom: -12rem;
            left: 50%;
            transform: translateX(-50%);
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
            bottom: -12rem;
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
        @media only screen and (max-width: 1199.98px) {
            .img_jumbotron  {
                bottom: -10%;
            }
        }

        @media only screen and (max-width: 1199.98px) {
            .jumbotron h1 {
                font-size: 4rem;
                -webkit-text-stroke: 2px #ffffff;
            }
            .img_jumbotron  {
                bottom: -9%;
                width: 100%;
            }
            .ball2  {
                width: 400px;
                top: -20%;
                z-index: -1;
            }
            .nav-link.nav-product {
                font-size: .875rem;
                padding: .5rem 1.25rem !important;
            }
            .image_player img {
                height: 30rem;
            }
            .name h1,
            .nomor h1 {
                font-size: 2.25rem;
            }
            .name a {
                font-size: 1rem;
            }
            .slick-next {
                right: 0 !important;
            }
            .slick-prev {
                left: 0 !important;
            }
        }

        @media only screen and (max-width: 575.98px) {
            .jumbotron {
                height: 35rem;
            }
            .img_jumbotron  {
                bottom: -5%;
                width: 100% !important;
            }
            .logo-tim {
                width: 80px;
            }
        }
    </style>
@endpush
@section('content')
    <!-- Jumbotron -->
    <section id="jumbotron">
        <div class="jumbotron">
            <div class="container">
                <h1>
                    BERANDA BALI <br />
                    FOOTBALL CLUB
                </h1>
                <div class="img_jumbotron">
                    <img src="/assets/frontend/images/jumbotron_tim.png" alt="" />
                </div>
            </div>
        </div>
        <img src="/assets/frontend/images/logo-tim.svg" class="logo-tim" width="100" alt="">
    </section>
    <!-- End Jumbotron -->

    <!-- Player -->
    <section id="player">
        <div class="container">
            <ul class="nav nav-tabs mb-0 d-flex justify-content-center border-bottom-0" id="myTab" role="tablist">
                @foreach ($types as $type)
                    <form action="{{ route('user.team.index') }}" method="GET">
                        <input type="hidden" name="type" value="{{ $type->type }}" onclick="this.form.submit()">
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link nav-product {{ request()->type == $type->type ? 'active' : '' }} 
                                {{ request()->type == null && $type->type == 'Pemain' ? 'active' : '' }}"
                                id="player-tab" data-bs-toggle="tab" data-bs-target="#tab-player" type="submit"
                                role="tab" aria-controls="tab-player" aria-selected="true">
                                {{ $type->type }}
                            </button>
                        </li>
                    </form>
                @endforeach
            </ul>
            </form>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-player" role="tabpanel" aria-labelledby="player-tab"
                    tabindex="0">
                    <div class="team-slider slider justify-content-center">
                        @foreach ($datas as $item)
                            <div class="slide">
                                <div class="box_player">
                                    <div class="image_player">
                                        <img src="{{ $item->image }}" alt="" />
                                    </div>
                                    @if ($item->type == 'Pemain')
                                        <div class="nomor">
                                            <h1>{{ $item->number }}</h1>
                                        </div>
                                        <div class="name">
                                            <h1 class="mb-3">{{ $item->name }}</h1>
                                            <a href="{{ route('user.team.show', $item->id) }}">Lihat Detail</a>
                                        </div>
                                    @else
                                        <div class="name">
                                            <h1 class="mb-3">{{ $item->name }}</h1>
                                            <a href="#">{{ $item->position }}</a>
                                        </div>
                                    @endif
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

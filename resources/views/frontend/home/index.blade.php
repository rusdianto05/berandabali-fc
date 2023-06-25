@extends('layouts.frontend.master', ['title' => 'Home'])
@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/style.css') }}" />
    <style>
        * {
            color: white;
        }

        body {
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
        }

        #jumbotron {
            margin-top: 4rem;
            min-height: 100vh;
            height: 100%;
            width: 100%;
            background: linear-gradient(180deg,
                    rgba(90, 25, 25, 0.15) 10%,
                    rgba(31, 30, 82, 0.82) 52.84%,
                    #05033a 100%),
                url(./assets/frontend/images/jumbotron.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center
        }

        h1.title {
            font-family: var(--lilita) !important;
            font-size: 3.5rem;
        }

        p.subtitle {
            font-size: 1.125rem;
            font-weight: 600;
            letter-spacing: 0.005em;
            line-height: 153%;
            text-align: center;
        }

        p.subtitle1 {
            font-size: 1.125rem;
            font-weight: 500;
            letter-spacing: 0.005em;
            line-height: 153%;
            text-align: center;
        }

        /* Sponsored */
        #sponsored::before {
            content: "";
            width: 100%;
            position: absolute;
            height: 100%;
            top: 0;
            background: rgba(145, 145, 145, 0.22);
        }

        #sponsored {
            position: relative;
            height: auto;
        }

        .img_slider {
            width: 170px;
            height: 100px;
            object-fit: contain;
        }

        /* End Sponsored */

        /* Match */
        #match {
            position: relative;
            overflow: hidden;
            padding-top: 6rem;
        }

        h1.title_lilita,
        h1.title_lilita span {
            font-family: var(--lilita) !important;
            text-transform: uppercase;
        }

        h1.title_lilita span {
            color: var(--primary1);
        }

        .mb_title {
            margin-bottom: 4.5rem !important;
        }

        .ball1 {
            position: absolute;
            top: -10rem;
            right: -8rem;
            z-index: -99;
        }

        .ball2 {
            position: absolute;
            bottom: -5rem;
            right: -8rem;
            z-index: -99;
        }

        .ball3 {
            position: absolute;
            bottom: -10rem;
            left: -25rem;
            z-index: -99;
        }

        #match h1,
        #article h1 {
            font-weight: 800;
            font-size: 2.5rem;
        }

        .card_match {
            background: rgba(90, 90, 90, 0.25);
            border-radius: 8px;
            overflow: hidden !important;
        }

        .card_body {
            padding: 2rem 1rem;
            text-align: center;
            font-weight: 700;
        }

        .card_body h6 {
            font-size: 2rem;
            color: white;
            font-weight: 700;
        }

        .card_header {
            background: #ffc742;
            text-align: center;
            padding: 0.75rem 2rem;
            font-weight: 800;
        }

        .card_footer {
            background: #352481;
            padding: 0.75rem 2rem;
            font-weight: 700;
            letter-spacing: -0.005em;
            line-height: 1.5rem
        }
        .img_tim {
            height: 80px;
        }

        /* End Match */

        /* Profile */
        #profile {
            padding-top: 8rem;
        }

        #profile h1,
        #profile span {
            font-family: var(--lilita) !important;
            font-size: 2.5rem;
            line-height: 150%;
        }

        #profile span {
            color: var(--primary1);
        }

        /* End Profile */

        /* Article */
        #article {
            padding: 8rem 0;
        }

        .article_container {
            display: flex;
            gap: 2.5rem;
            align-items: center;
            margin-top: 5rem;
        }

        .card_article {
            width: 100%;
            height: 16rem;
            position: relative;
        }

        .article_image {
            position: relative;
            height: 100%;
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
        }

        .article_image img {
            height: 100%;
            object-fit: cover;
        }

        .article_image::before {
            position: absolute;
            content: "";
            width: 100%;
            height: 100%;
            background: linear-gradient(81.86deg,
                    rgba(9, 4, 37, 0.78) 5.48%,
                    rgba(116, 21, 44, 0.76) 41.55%,
                    rgba(37, 16, 21, 0.35) 88.32%);
            top: 0;
        }

        .article_content {
            position: absolute;
            display: flex;
            flex-direction: column;
            justify-content: center;
            top: 2rem;
            bottom: 2rem;
            left: 2rem;
            width: 65%;
        }

        .article_content h1 {
            font-size: 1.25rem !important;
            line-height: 26px;
            font-weight: 800;
        }

        .article_content p,
        .article_content a {
            font-weight: 500;
            font-size: 0.75rem;
        }

        .article_content a {
            color: var(--yellow);
        }

        /* End Article */
        .btn_primary {
            border-radius: 95px !important;
        }

        /* Responsiveness */
        @media only screen and (min-width: 992px) {
            .article-slider .slick-slide {
                opacity: 0.7;
                transition: opacity 0.3s;
                padding-left: 1rem;
                padding-right: 1rem;
                transform: scale(0.8);
                margin: 2rem 0;
            }
            .article-slider .slick-slide.slick-cloned {
                opacity: 0.7;
                transition: opacity 0.3s;
                transform: scale(0.8);
            }

            .article-slider .slick-slide.slick-current.slick-active {
                opacity: 1;
                transform: scale(1.2);
                transition: opacity 0.3s;
            }
        }
        @media only screen and (max-width: 1199.98px) {
            h1.title {
                font-size: 3rem;
            }
            .article_content h1 {
                font-size: 1.125rem !important;
            }
            p.subtitle,
            .btn_primary,
            p.subtitle1 {
                font-size: 1rem;
            }
            .card_header,
            .card_body,
            .card_footer {
                font-size: .875rem;
            }
            #match h1, #article h1,
            #profile h1, #profile span {
                font-size: 2.25rem;
            }
            .card_body h6 {
                font-size: 1.875rem;
            }
        }
        @media only screen and (max-width: 991.98px) {
            /* Jumbotron */
            h1.title {
                font-size: 2.5rem;
                line-height: 2.75rem;
            }
            .w-65 {
                width: 100%;
            }
            .ball1 {
                width: 400px;
            }
            /* End Jumbotron */

            /* match */
            .ball3 {
                width: 600px;
                bottom: 2rem;
            }
            /* end match */
            /* about */
            #profile {
                padding-top: 6rem;
            }
            /* end about */

            /* article */
            .article-slider .slick-slide {
                margin: 0 .5rem !important;
            }
            /* end article */
        }

        @media only screen and (max-width: 575.98px) {
            .img_slider {
                width: 100%;
            }
            .slick-slide {
                margin: 0 .5rem !important;
            }
            .slick-next {
                right: 0 !important;
            }
            .slick-prev {
                left: 0 !important;
            }
        }
        /* End Responsiveness */
    </style>
@endpush
@section('content')
    <!-- Jumbotron -->
    <section id="jumbotron">
        <div class="container">
            <div class="d-flex justify-content-center flex-column align-items-center">
                <h1 class="title">BERANDA BALI FOOTBALL CLUB</h1>
                <p class="subtitle mt-2 mb-5 w-65">
                    BerandaBali FC adalah sebuah klub sepak bola yang berbasis di
                    Provinsi Bali, Indonesia. Klub ini berdiri pada tahun 2021 dan
                    bermarkas di Stadion Kapten I Wayan Dipta, Gianyar.
                </p>
                <a href="{{ url('match') }}" class="btn_primary">Lihat Jadwal Pertandingan</a>
            </div>
        </div>
    </section>
    <!-- End Jumbotron -->
    <!-- Sponsored -->
    <section id="sponsored">
        <div class="container">
            <div class="customer-logos slider">
                <div class="slide">
                    <img src="./assets/frontend/images/icons/logo1.svg" class="img_slider" alt="" />
                </div>
                <div class="slide">
                    <img src="./assets/frontend/images/icons/logo2.svg" class="img_slider" alt="" />
                </div>
                <div class="slide">
                    <img src="./assets/frontend/images/icons/logo3.svg" class="img_slider" alt="" />
                </div>
                <div class="slide">
                    <img src="./assets/frontend/images/icons/logo4.svg" class="img_slider" alt="" />
                </div>
                <div class="slide">
                    <img src="./assets/frontend/images/icons/logo5.svg" class="img_slider" alt="" />
                </div>
                <div class="slide">
                    <img src="./assets/frontend/images/icons/logo1.svg" class="img_slider" alt="" />
                </div>
                <div class="slide">
                    <img src="./assets/frontend/images/icons/logo2.svg" class="img_slider" alt="" />
                </div>
                <div class="slide">
                    <img src="./assets/frontend/images/icons/logo3.svg" class="img_slider" alt="" />
                </div>
                <div class="slide">
                    <img src="./assets/frontend/images/icons/logo4.svg" class="img_slider" alt="" />
                </div>
                <div class="slide">
                    <img src="./assets/frontend/images/icons/logo5.svg" class="img_slider" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Sponsored -->
    <!-- End Sponsored -->

    <!-- Match -->
    <section id="match">
        <div class="container">
            <img src="{{ asset('/assets/frontend/images/icons/ball.svg') }}" width="500" class="ball1" alt="" />
            <img src="{{ asset('/assets/frontend/images/icons/ball.svg') }}" width="300" class="ball2" alt="" />
            <img src="{{ asset('/assets/frontend/images/icons/ball.svg') }}" width="700" class="ball3" alt="" />
            <div class="text-center mb_title">
                <h1 class="title_lilita">Pertandingan <span>Terdekat</span></h1>
                <p class="subtitle1">
                    Dapatkan tiket pertandingan terdekat melalui website official beranda bali footballclub
                </p>
            </div>
            <div class="row justify-content-center gap-md-0 gap-4 gap-lg-4">
                <?php $i = 1; ?>
                @foreach ($match as $item)
                    <div class="col-lg-5 col-md-6">
                        <div class="card_match">
                            <div class="card_header">
                                <div class="mb-0" id="countdown{{ $i }}"></div>
                            </div>
                            <div class="card_body d-flex justify-content-between align-items-center">
                                <div class="text-center">
                                    <img src="{{ asset('assets\media\logos\sidebar-logo.png') }}" class="img_tim"
                                        alt="" />
                                    <p class="mt-2">BerandaBali FC</p>
                                </div>
                                <h6 class="mb-0">VS</h6>
                                <div class="text-center">
                                    <img src="{{ $item->opponent_logo }}" class="img_tim" alt="" />
                                    <p class="mt-2 text-center">{{ $item->opponent_name }}</p>
                                </div>
                            </div>
                            <div class="card_footer text-center">
                                <p class="mb-0">{{ date('d F Y', strtotime($item->match_date)) }} |
                                    {{ date('H:i', strtotime($item->match_date)) }} WIB
                                <br />{{ $item->match_location }}</p>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Match -->

    <!-- Profile Club -->
    <section id="profile" class="container">
        <div class="row align-items-center">
            <div class="col-md-6 order-last order-md-first mt-4 mt-md-0">
                <h1 class="mb-4">
                    BERANDA BALI <br />
                    FOOTBALL
                    <span>CLUB</span>
                </h1>
                <p class="subtitle1 text-start mb-5">
                    Sejarah BerandaBali FC dimulai dengan visi untuk memajukan sepak bola di pulau Bali dan memberikan
                    kesempatan kepada bakat-bakat lokal untuk berkembang. Klub ini didirikan oleh sekelompok pengusaha Bali
                    yang memiliki hasrat yang sama untuk mengembangkan olahraga sepak bola di daerah mereka.
                </p>
                <a href="./profile-club/index.html" class="btn_primary">Lihat Profil Klub</a>
            </div>
            <div class="col-md-6 ps-md-5">
                <img src="/assets/frontend/images/profile_club.png" width="100%" alt="" />
            </div>
        </div>
    </section>
    <!-- End Profile Club -->

    <!-- Artikel -->
    <section id="article">
        <div class="container">
            <div class="text-center mb_title">
                <h1>Artikel</h1>
                <p class="subtitle">
                    Berikut adalah artikel terbaru dari BerandaBali FC yang dapat anda baca dan pelajari
                </p>
            </div>
            <div class="article-slider slider">
                @foreach ($article as $item)
                    <div class="slide">
                        <div class="card_article">
                            <a href="{{ url('article', $item->slug) }}">
                                <div class="article_image">
                                    <img src="{{ $item->image }}" width="100%" alt="{{ $item->slug }}" />
                                </div>
                                <div class="article_content">
                                    <h1>{{ Str::limit($item->title, 30, '...') }}</h1>
                                    <p>
                                        {!! Str::limit($item->content, 84, '...') !!}
                                    </p>
                                    <a href="{{ url('article', $item->slug) }}">Baca artikel
                                        <img src="./assets/frontend/images/icons/arrow.svg" width="20"
                                            class="ms-1 d-inline" alt="" /></a>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Artikel -->
@endsection
@push('js')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        var countDownDate1 = new Date("{{ $match[0]->match_date }}").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate1 - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // loop for match 1 - 2
            document.getElementById("countdown1").innerHTML = days + " Hari : " + hours +
                " Jam : " + minutes +
                " Menit : " + seconds + " Detik ";
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown1").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
    <script>
        var countDownDate2 = new Date("{{ $match[1]->match_date }}").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate2 - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // loop for match 1 - 2
            document.getElementById("countdown2").innerHTML = days + " Hari : " + hours +
                " Jam : " + minutes +
                " Menit : " + seconds + " Detik ";
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown2").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
    <script>
        $(document).ready(function() {
            $(".customer-logos").slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                dots: false,
                pauseOnHover: false,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        },
                    },
                ],
            });
        });

        $(document).ready(function() {
            $(".article-slider").slick({
                centerMode: true,
                centerPadding: "5px",
                dots: false,
                arrows: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                lazyLoad: "ondemand",
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                            centerMode: false,
                        },
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                            centerMode: false,
                        },
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            centerMode: false,
                        },
                    },
                ],
            });
        });
    </script>
@endpush

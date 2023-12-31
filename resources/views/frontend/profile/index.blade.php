@extends('layouts.frontend.master', ['title' => 'Profil Klub'])
@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        body {
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
            color: white;
            overflow-x: hidden;
        }

        /* Jumbotron */
        .jumbotron {
            background: linear-gradient(180deg, #19184b 0%, #030226 100%);
            background-repeat: no-repeat;
            min-height: 100vh;
            height: 100%;
            margin-top: 4rem;
            position: relative;
            display: flex;
            align-items: center;
            color: white;
        }

        .title {
            font-family: var(--lilita) !important;
            font-size: 4rem;
            line-height: 125%;
        }

        .subtitle {
            font-size: 1.125rem;
            font-weight: 600;
            letter-spacing: 0.005em;
            line-height: 153%;
        }

        .logo_transparent {
            position: absolute;
            width: 350px;
            right: 10%;
            bottom: 6rem;
        }

        .img_player {
            position: absolute;
            right: 0;
            height: 85%;
            bottom: 0;
        }

        .carousel-indicators {
            top: 6rem !important;
            right: auto !important;
            margin-left: 5rem !important;
        }

        .carousel-indicators button {
            width: 0.5rem !important;
            height: 0.5rem !important;
            border-radius: 100% !important;
            margin-right: 0.75rem !important;
        }

        /* End Jumbotron */

        /* About */
        #about {
            padding: 6rem 0;
        }

        #about h1,
        #about h1 span {
            font-family: var(--lilita);
            font-size: 2.5rem;
        }

        #about h1 span {
            color: var(--primary1) !important;
        }

        .subs {
            letter-spacing: 0.005em;
            font-weight: 500;
            font-size: 1.125rem;
            margin-bottom: 2rem;
        }

        .mask_img1 {
            -webkit-mask-image: url("/assets/frontend/images/bg1.png");
            mask-image: url("/assets/frontend/images/bg1.png");
            -webkit-mask-repeat: no-repeat;
            mask-repeat: no-repeat;
            height: 25rem;
            width: 100%;
            overflow: hidden !important;
        }

        .mask_img2 {
            -webkit-mask-image: url("/assets/frontend/images/bg.png");
            mask-image: url("/assets/frontend/images/bg.png");
            -webkit-mask-repeat: no-repeat;
            mask-repeat: no-repeat;
            height: 25rem;
            width: 100%;
            overflow: hidden !important;
            margin: 2rem 0;
        }

        .mask_img1 img,
        .mask_img2 img,
        .mask_img img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .mask_img3 {
            -webkit-mask-image: url("/assets/frontend/images/bg2.png");
            mask-image: url("/assets/frontend/images/bg2.png");
            -webkit-mask-repeat: no-repeat;
            mask-repeat: no-repeat;
            height: 25rem;
            width: 100%;
            overflow: hidden !important;
        }

        .margin_top {
            margin: 2rem 0;
        }

        .arrow {
            filter: brightness(0) invert(1);
        }

        .links {
            margin-top: -11rem !important;
            position: absolute !important;
            left: 0;
            right: 0;
        }

        .links p {
            font-weight: 500;
            font-size: 1.125rem;
            opacity: 0.7;
        }

        /* End About */

        /* Beranda */
        #beranda {
            margin-top: -8rem;
            padding-bottom: 8rem;
        }

        .box_beranda {
            background: #3c2e6b;
            border-radius: 24px;
            padding: 3rem;
        }

        .box_beranda h1,
        .box_beranda h1 span,
        #championship h1 {
            font-size: 2.5rem;
            font-family: var(--lilita);
            margin-bottom: 1.5rem;
        }

        .box_beranda p {
            font-weight: 500;
            font-size: 1.125rem;
            line-height: 153%;
            letter-spacing: 0.005em;
            margin-bottom: 0;
        }

        /* End Beranda */

        /* Championship */
        #championship {
            width: 100vw;
            overflow: hidden;
        }

        .championship_container {
            margin-top: 4rem;
        }

        .box_championsip {
            width: 100%;
            height: 25rem;
            position: relative;
        }

        .box_championsip::before {
            content: "";
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg,
                    rgba(115, 31, 31, 0.35) 10%,
                    rgba(31, 30, 82, 0.64) 47.43%,
                    rgba(5, 3, 58, 0.91) 100%);
            position: absolute;
        }

        .content_championship {
            position: absolute;
            bottom: 2rem;
            left: 2rem;
            right: 2rem;
        }

        .box_championsip img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .date {
            font-size: 0.75rem;
            font-weight: 600;
            color: white !important;
        }

        .content p {
            font-size: 0.875rem;
            color: white !important;
        }

        .box_championsip h6 {
            font-size: 1.125rem;
            color: white !important;
            font-weight: 800;
        }

        a.link_more {
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .carousel-control-next,
        .carousel-control-prev {
            width: 5% !important;
        }

        @media only screen and (max-width: 1199.98px) {
            #about h1, #about h1 span,
            .box_beranda h1, .box_beranda h1 span, #championship h1 {
                font-size: 2.25rem;
            }
            .title {
                font-size: 2.5rem;
            }
            .subtitle,
            .subs,
            .box_beranda p {
                font-size: 1rem;
            }
        }

        @media only screen and (max-width: 991.98px){
            .w-50 {
                width: 100% !important;
            }
        }
        @media only screen and (max-width: 767.98px) {
            .slick-next {
                right: 0 !important;
            }
            .slick-prev {
                left: 0 !important;
            }
            .w-75 {
                width: 100% !important;
            }
            .box_beranda {
                padding: 2rem;
            }
            .box_championsip h6,
            .links p {
                font-size: 1rem;
            }
            .content p,
            a.link_more {
                font-size: .75rem;
            }
            .date {
                font-size: .7rem;
            }
            .mask_img1, .mask_img3 {
                display: none !important;
            }
            .mask_img2  {
                -webkit-mask-image: none !important;
                height: 20rem;
            }
            .links {
                margin-top: -1rem !important;
            }
            #about {
                margin-bottom: 8rem
            }
        }

        @media only screen and (max-width: 575.98px) {
            .mask_img2  {
                -webkit-mask-image: none !important;
                height: 15rem;
            }
        }
        /* End Championship */
    </style>
@endpush
@section('content')
    <!-- Jumbotron -->
    <section id="jumbotron">
        <div id="carouselJumbotron" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselJumbotron" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselJumbotron" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselJumbotron" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <div class="jumbotron">
                        <div class="container">
                            <div class="w-50 text-center text-lg-start">
                                <h1 class="title text">
                                    BERANDA BALI <br />
                                    FOOTBALL CLUB
                                </h1>
                                <p class="subtitle mt-3 mb-5">
                                    BerandaBali FC adalah sebuah klub sepak bola yang bermarkas di Bali, Indonesia. Klub ini
                                    berdiri pada tahun 2021. BerandaBali FC berkompetisi di Liga 2 Indonesia.
                                </p>
                                <a href="#about" class="btn_primary">Lihat lebih banyak</a>
                            </div>
                            <img src="/assets/frontend/images/logo-transparent.png" class="logo_transparent d-none d-lg-block"
                                alt="" />
                            <img src="/assets/frontend/images/player1.png" class="img_player d-none d-lg-block" alt="" />
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <div class="jumbotron">
                        <div class="container">
                            <div class="w-50 text-center text-lg-start">
                                <h1 class="title text">
                                    BERANDA BALI <br />
                                    FOOTBALL CLUB
                                </h1>
                                <p class="subtitle mt-3 mb-5">
                                    BerandaBali FC adalah sebuah klub sepak bola yang bermarkas di Bali, Indonesia. Klub ini
                                    berdiri pada tahun 2021. BerandaBali FC berkompetisi di Liga 2 Indonesia.
                                </p>
                                <a href="#about" class="btn_primary">Lihat lebih banyak</a>
                            </div>
                            <img src="/assets/frontend/images/logo-transparent.png" class="logo_transparent d-none d-lg-block"
                                alt="" />
                            <img src="/assets/frontend/images/player1.png" class="img_player d-none d-lg-block" alt="" />
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <div class="jumbotron">
                        <div class="container">
                            <div class="w-50 text-center text-lg-start">
                                <h1 class="title text">
                                    BERANDA BALI <br />
                                    FOOTBALL CLUB
                                </h1>
                                <p class="subtitle mt-3 mb-5">
                                    BerandaBali FC adalah sebuah klub sepak bola yang bermarkas di Bali, Indonesia. Klub ini
                                    berdiri pada tahun 2021. BerandaBali FC berkompetisi di Liga 2 Indonesia.
                                </p>
                                <a href="#about" class="btn_primary">Lihat lebih banyak</a>
                            </div>
                            <img src="/assets/frontend/images/logo-transparent.png" class="logo_transparent d-none d-lg-block"
                                alt="" />
                            <img src="/assets/frontend/images/player1.png" class="img_player d-none d-lg-block" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Jumbotron -->

    <!-- About -->
    <section id="about">
        <div class="container">
            <div class="text-center">
                <h1 class="mb-3">ABOUT <span>BERANDA BALI</span> FOOTBALL CLUB</h1>
                <div class="d-flex flex-column align-items-center">
                    <p class="w-75 subs">
                        Lorem ipsum dolor sit amet consectetur. Viverra adipiscing sapien tincidunt id nullam enim
                        ut massa. Massa proin vitae malesuada eget tortor neque adipiscing. Faucibus sed viverra
                        duis tincidunt. pharetra pellentesque. Ac dui id nec tortor urna amet ut elit.
                    </p>
                </div>
                <div class="galery-images slider">
                    @foreach ($galleries as $index => $gallery)
                        @if ($index % 3 == 0)
                            <div class="slider">
                                <div class="row justify-content-center w-100">
                                    @for ($i = $index; $i < $index + 3 && $i < count($galleries); $i++)
                                        <div class="col-md-4">
                                            <div class="mask_img{{ $i % 3 + 1 }}">
                                                <img src="{{ $galleries[$i]->image }}" alt="" />
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>                
                <a href="{{ url('galery') }}" class="d-flex gap-3 links justify-content-center align-items-center">
                    <p class="text-white mb-0">Lihat semua galeri</p>
                    <img src="/assets/frontend/images/icons/arrow-red.svg" class="arrow" alt="" />
                </a>
            </div>
        </div>
    </section>
    <!-- End About -->

    <!-- Beranda Bali -->
    <section id="beranda" class="container">
        <div class="box_beranda">
            <div class="row align-items-center">
                <div class="col-md-6 pe-md-5 mt-4 mt-md-0 order-last order-md-first">
                    <h1>
                        BERANDA BALI <br />
                        FOOTBALL <span class="text_primary">CLUB</span>
                    </h1>
                    <p>
                        Sejarah BerandaBali FC dimulai dengan visi untuk memajukan sepak bola di pulau Bali dan memberikan
                        kesempatan kepada bakat-bakat lokal untuk berkembang. Klub ini didirikan oleh sekelompok pengusaha
                        Bali yang memiliki hasrat yang sama untuk mengembangkan olahraga sepak bola di daerah mereka.
                        Setelah didirikan, BerandaBali FC segera bergabung dalam kompetisi tingkat lokal, seperti Liga 3 dan
                        Liga 2 di Indonesia.
                    </p>
                </div>
                <div class="col-md-6 ps-md-5">
                    <img src="/assets/frontend/images/profile_club.png" width="100%" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Beranda Bali -->

    <!-- Championship -->
    <section id="championship">
        <div class="container">
            <h1 class="text-center">KEJUARAAN YANG DIRAIH</h1>
        </div>
        <div class="championship_slider slider mt-5">
            @foreach ($championships as $item)
                <div class="slide">
                    <a href="{{ url('article', $item->slug) }}">
                        <div class="box_championsip">
                            <img src="{{ asset($item->image) }}" class="img_championship" alt="{{ $item->slug }}" />
                            <div class="content_championship">
                                <p class="date">{{ $item->created_at->format('d M, Y') }}</p>
                                <h6>{{ $item->title }}</h6>
                                <div class="content">
                                    {!! Str::limit($item->content, 100, '...') !!}
                                </div>
                                <a href="{{ url('article', $item->slug) }}" class="link_more">See More</a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    <!-- End Championship -->
@endsection
@push('js')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".galery-images").slick({
                dots: false,
                infinite: true,
                speed: 500,
                autoplay: true,
                autoplaySpeed: 3000,
                fade: true,
                cssEase: "linear",
            });
        });

        $(document).ready(function() {
            $(".championship_slider").slick({
                slidesToShow: 3,
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
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        },
                    },
                ],
            });
        });
    </script>
@endpush

@extends('layouts.frontend.master', ['title' => 'Profil Klub'])
@push('css')
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
            position: relative;
            display: flex;
            align-items: center;
            color: white;
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
            margin-left: 3rem !important;
        }

        .carousel-indicators button {
            width: 0.75rem !important;
            height: 0.75rem !important;
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

        .mask_img {
            -webkit-mask-image: url("../assets/images/bg.png");
            mask-image: url("../assets/images/bg.png");
            -webkit-mask-repeat: no-repeat;
            mask-repeat: no-repeat;
            height: 25rem;
            width: 100%;
            overflow: hidden !important;
        }

        .mask_img1 img,
        .mask_img2 img,
        .mask_img img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .mask_img2 {
            -webkit-mask-image: url("../assets/images/bg2.png");
            mask-image: url("../assets/images/bg2.png");
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
            margin-top: 3rem;
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

        .content {
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
                            <div class="w-50">
                                <h1 class="title">
                                    BERANDA BALI <br />
                                    FOOTBALL CLUB
                                </h1>
                                <p class="subtitle mt-3 mb-5">
                                    BerandaBali FC adalah sebuah klub sepak bola yang bermarkas di Bali, Indonesia. Klub ini
                                    berdiri pada tahun 2021. BerandaBali FC berkompetisi di Liga 2 Indonesia.
                                </p>
                                <a href="#about" class="btn_primary">Lihat lebih banyak</a>
                            </div>
                            <img src="/assets/frontend/images/logo-transparent.png" class="logo_transparent"
                                alt="" />
                            <img src="/assets/frontend/images/player1.png" class="img_player" alt="" />
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <div class="jumbotron">
                        <div class="container">
                            <div class="w-50">
                                <h1 class="title">
                                    BERANDA BALI <br />
                                    FOOTBALL CLUB
                                </h1>
                                <p class="subtitle mt-3 mb-5">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s
                                </p>
                                <a href="#about" class="btn_primary">Lihat lebih banyak</a>
                            </div>
                            <img src="/assets/frontend/images/logo-transparent.png" class="logo_transparent"
                                alt="" />
                            <img src="/assets/frontend/images/player1.png" class="img_player" alt="" />
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <div class="jumbotron">
                        <div class="container">
                            <div class="w-50">
                                <h1 class="title">
                                    BERANDA BALI <br />
                                    FOOTBALL CLUB
                                </h1>
                                <p class="subtitle mt-3 mb-5">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s
                                </p>
                                <a href="#about" class="btn_primary">Lihat lebih banyak</a>
                            </div>
                            <img src="/assets/frontend/images/logo-transparent.png" class="logo_transparent"
                                alt="" />
                            <img src="/assets/frontend/images/player1.png" class="img_player" alt="" />
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
                        {{-- Lorem ipsum dolor sit amet consectetur. Viverra adipiscing sapien tincidunt id nullam enim
                        ut massa. Massa proin vitae malesuada eget tortor neque adipiscing. Faucibus sed viverra
                        duis tincidunt. pharetra pellentesque. Ac dui id nec tortor urna amet ut elit. --}}
                        {{-- buatkan kata kata deskripsi galeri berandabali fc --}}
                        Berikut adalah beberapa foto yang diambil dari berbagai kegiatan yang dilakukan oleh BerandaBali FC
                        melalui beberapa event yang diikuti.
                    </p>
                </div>
                <div class="row justify-content-center w-100">
                    <div class="col-md-4">
                        <div class="mask_img1">
                            <img src="/assets/frontend/images/article.png" alt="" />
                        </div>
                    </div>
                    <div class="col-md-4 margin_top">
                        <div class="mask_img">
                            <img src="/assets/frontend/images/article.png" alt="" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mask_img2">
                            <img src="/assets/frontend/images/article.png" alt="" />
                        </div>
                    </div>
                </div>
                <a href="../galery/index.html" class="d-flex gap-3 links justify-content-center align-items-center">
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
            <div class="row">
                <div class="col-md-6 pe-md-5">
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
        <h1 class="text-center">KEJUARAAN YANG DIRAIH</h1>
        <div id="carouselChampionship" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <div class="row championship_container justify-content-between">
                        <div class="col-md-4 px-0">
                            <a href="../article/detail/index.html">
                                <div class="box_championsip">
                                    <img src="/assets/frontend/images/champion1.png" class="img_championship"
                                        alt="" />
                                    <div class="content_championship">
                                        <p class="date">27 Dec, 2022</p>
                                        <h6>Juara 1 Hamengkubuwono CUP</h6>
                                        <p class="content">
                                            Lorem ipsum dolor sit amet consectetur. Lobortis aliquam. Lorem ipsum
                                            dolor sit amet consectetur. Lobortis aliquam Lobortis aliquam....
                                        </p>
                                        <a href="../article/detail/index.html" class="link_more">See More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 px-0">
                            <a href="../article/detail/index.html">
                                <div class="box_championsip">
                                    <img src="/assets/frontend/images/champion2.png" class="img_championship"
                                        alt="" />
                                    <div class="content_championship">
                                        <p class="date">27 Dec, 2022</p>
                                        <h6>Juara 1 Hamengkubuwono CUP</h6>
                                        <p class="content">
                                            Lorem ipsum dolor sit amet consectetur. Lobortis aliquam. Lorem ipsum
                                            dolor sit amet consectetur. Lobortis aliquam Lobortis aliquam....
                                        </p>
                                        <a href="../article/detail/index.html" class="link_more">See More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 px-0">
                            <a href="../article/detail/index.html">
                                <div class="box_championsip">
                                    <img src="/assets/frontend/images/champion3.png" class="img_championship"
                                        alt="" />
                                    <div class="content_championship">
                                        <p class="date">27 Dec, 2022</p>
                                        <h6>Juara 1 Hamengkubuwono CUP</h6>
                                        <p class="content">
                                            Lorem ipsum dolor sit amet consectetur. Lobortis aliquam. Lorem ipsum
                                            dolor sit amet consectetur. Lobortis aliquam Lobortis aliquam....
                                        </p>
                                        <a href="../article/detail/index.html" class="link_more">See More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <div class="row championship_container justify-content-between">
                        <div class="col-md-4 px-0">
                            <a href="../article/detail/index.html">
                                <div class="box_championsip">
                                    <img src="/assets/frontend/images/champion1.png" class="img_championship"
                                        alt="" />
                                    <div class="content_championship">
                                        <p class="date">27 Dec, 2022</p>
                                        <h6>Juara 1 Hamengkubuwono CUP</h6>
                                        <p class="content">
                                            Lorem ipsum dolor sit amet consectetur. Lobortis aliquam. Lorem ipsum
                                            dolor sit amet consectetur. Lobortis aliquam Lobortis aliquam....
                                        </p>
                                        <a href="../article/detail/index.html" class="link_more">See More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 px-0">
                            <a href="../article/detail/index.html">
                                <div class="box_championsip">
                                    <img src="/assets/frontend/images/champion2.png" class="img_championship"
                                        alt="" />
                                    <div class="content_championship">
                                        <p class="date">27 Dec, 2022</p>
                                        <h6>Juara 1 Hamengkubuwono CUP</h6>
                                        <p class="content">
                                            Lorem ipsum dolor sit amet consectetur. Lobortis aliquam. Lorem ipsum
                                            dolor sit amet consectetur. Lobortis aliquam Lobortis aliquam....
                                        </p>
                                        <a href="../article/detail/index.html" class="link_more">See More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 px-0">
                            <a href="../article/detail/index.html">
                                <div class="box_championsip">
                                    <img src="/assets/frontend/images/champion3.png" class="img_championship"
                                        alt="" />
                                    <div class="content_championship">
                                        <p class="date">27 Dec, 2022</p>
                                        <h6>Juara 1 Hamengkubuwono CUP</h6>
                                        <p class="content">
                                            Lorem ipsum dolor sit amet consectetur. Lobortis aliquam. Lorem ipsum
                                            dolor sit amet consectetur. Lobortis aliquam Lobortis aliquam....
                                        </p>
                                        <a href="../article/detail/index.html" class="link_more">See More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row championship_container justify-content-between">
                        <div class="col-md-4 px-0">
                            <a href="../article/detail/index.html">
                                <div class="box_championsip">
                                    <img src="/assets/frontend/images/champion1.png" class="img_championship"
                                        alt="" />
                                    <div class="content_championship">
                                        <p class="date">27 Dec, 2022</p>
                                        <h6>Juara 1 Hamengkubuwono CUP</h6>
                                        <p class="content">
                                            Lorem ipsum dolor sit amet consectetur. Lobortis aliquam. Lorem ipsum
                                            dolor sit amet consectetur. Lobortis aliquam Lobortis aliquam....
                                        </p>
                                        <a href="../article/detail/index.html" class="link_more">See More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 px-0">
                            <a href="../article/detail/index.html">
                                <div class="box_championsip">
                                    <img src="/assets/frontend/images/champion2.png" class="img_championship"
                                        alt="" />
                                    <div class="content_championship">
                                        <p class="date">27 Dec, 2022</p>
                                        <h6>Juara 1 Hamengkubuwono CUP</h6>
                                        <p class="content">
                                            Lorem ipsum dolor sit amet consectetur. Lobortis aliquam. Lorem ipsum
                                            dolor sit amet consectetur. Lobortis aliquam Lobortis aliquam....
                                        </p>
                                        <a href="../article/detail/index.html" class="link_more">See More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 px-0">
                            <a href="../article/detail/index.html">
                                <div class="box_championsip">
                                    <img src="/assets/frontend/images/champion3.png" class="img_championship"
                                        alt="" />
                                    <div class="content_championship">
                                        <p class="date">27 Dec, 2022</p>
                                        <h6>Juara 1 Hamengkubuwono CUP</h6>
                                        <p class="content">
                                            Lorem ipsum dolor sit amet consectetur. Lobortis aliquam. Lorem ipsum
                                            dolor sit amet consectetur. Lobortis aliquam Lobortis aliquam....
                                        </p>
                                        <a href="../article/detail/index.html" class="link_more">See More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselChampionship"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselChampionship"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- End Championship -->
@endsection

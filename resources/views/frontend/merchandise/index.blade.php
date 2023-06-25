@extends('layouts.frontend.master', ['title' => 'Merchandise'])
@push('css')
    <style>
        body {
            color: white;
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
            background-repeat: no-repeat;
        }

        /* Jumbotron */
        #jumbotron {
            background-image: url("/assets/frontend/images/merchandise_bg.png");
            min-height: 100vh;
            height: 100%;
            margin-top: 4rem;
            width: 100%;
            background-size: cover;
            display: flex;
            justify-content: space-between;
            align-items: center;
            overflow: hidden;
            position: relative;
        }
        #jumbotron_content {
            position: relative;
        }

        .img_jumbotron {
            width: 100%;
            max-width: 450px;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        #jumbotron h1 {
            font-family: var(--lilita);
            font-size: 4rem;
        }

        #jumbotron p {
            font-size: 1.125rem;
            font-weight: 600;
            line-height: 153%;
        }

        .ball1,
        .ball2 {
            position: absolute;
        }

        .ball1 {
            top: 2rem;
            left: -14rem;
            width: 450px;
        }

        .ball2 {
            top: -2rem;
            right: -14rem;
            width: 450px;
        }

        .z_top {
            z-index: 1;
        }

        /* End Jumbotron */

        /* Product */
        #product {
            padding: 6rem 0;
        }

        h1.title {
            font-weight: 800;
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .box_product {
            background: #ffffff;
            border-radius: 20px;
            padding: 1rem 1.5rem;
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .img_box {
            height: 220px;
        }

        .img_box img {
            padding: 0 1rem;
            height: 200px;
            width: 100%;
            object-fit: contain;
        }

        .box_product p {
            font-weight: 700;
            color: black;
        }

        .buy_button {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: #fec02d;
            padding: 1rem;
            right: 0;
            left: 0;
        }

        .box_product:hover>.buy_button {
            display: block !important;
        }

        .box_product:hover>p {
            visibility: hidden !important;
        }

        .nav-link.nav-product {
            background-color: transparent !important;
            padding: 0.75rem 1rem !important;
            color: white !important;
            border: 3px solid #ffffff !important;
            border-radius: 10px !important;
            font-weight: 600 !important;
        }

        .nav-tabs {
            padding-bottom: 2rem !important;
            display: flex !important;
            gap: 1rem !important;
            margin-bottom: 3rem !important;
        }

        .nav-link.nav-product.active {
            background-color: white !important;
            color: #0a1524 !important;
            font-weight: 800 !important;
        }

        /* End Product */

        /* Responsiveness */
        @media only screen and (max-width: 1199.98px) {
            #jumbotron h1 {
                font-size: 3rem;
            }
            #jumbotron p,
            .btn_primary {
                font-size: 1rem;
            }
            .img_jumbotron {
                width: 400px;
            }
            .box_product p {
                font-size: .875rem;
            }
        }
        @media only screen and (max-width: 991.98px) {
            #jumbotron h1 {
                font-size: 2.5rem;
            }
            .ball2 {
                width: 300px;
                right: -10rem;
                top: -3rem;
            }
            .ball1 {
                width: 380px;
                top: 4rem;
            }
            .nav-link.nav-product {
                padding: 0.5rem .75rem !important
            }
            #product {
                padding: 4rem 0;
            }
            h1.title {
                font-size: 1.125rem;
            }
            .box_product {
                margin-bottom: 1.5rem;
            }
            .img_jumbotron {
                width: 300px;
            }
        }
        /* End Responsiveness */
    </style>
@endpush
@section('content')
    <!-- Jumbotron -->
    <section id="jumbotron">
        <img src="/assets/frontend/images/icons/ball.svg" class="ball1" alt="" />
        <img src="/assets/frontend/images/icons/ball.svg" class="ball2" alt="" />
        <div class="container" id="jumbotron_content">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 z_top text-center text-md-start">
                    <h1>
                        OFFICIAL <br />
                        MERCHANDISE
                    </h1>
                    <p class="mt-3 mb-5">
                        Setiap produk yang tersedia di halaman ini dirancang dengan detail yang cermat, menggunakan bahan
                        berkualitas tinggi, dan menampilkan desain yang khas.
                    </p>
                    <a href="#product" class="btn_primary">Beli Sekarang</a>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <img src="/assets/frontend/images/merchandise_jumbotron.png" class="img_jumbotron" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Jumbotron -->

    <!-- Product -->
    <section id="product">
        <div class="container">
            <!-- Navtabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <form action="{{ route('merchandise') }}" method="GET">
                    <input type="hidden" name="category" value="">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link nav-product {{ request()->category == '' ? 'active' : '' }}" type="submit">
                            Semua
                        </button>
                    </li>
                </form>
                @foreach ($category as $cat)
                    <form action="{{ route('merchandise') }}" method="GET">
                        <input type="hidden" name="category" value="{{ $cat->id }}">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link nav-product {{ request()->category == $cat->id ? 'active' : '' }}"
                                type="submit">
                                {{ $cat->name }} </button>
                        </li>
                    </form>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-all" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    @foreach ($cat_merchandise as $merchandise)
                        <div class="mb-5">
                            <h1 class="title">{{ $merchandise->name }}</h1>
                            <div class="row">
                                @foreach ($merchandise->merchandises as $item)
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <div class="box_product text-center">
                                            <div class="img_box">
                                                <img src="{{ $item->merchandiseImages->first()->image }}" class="mb-4"
                                                    alt="" />
                                            </div>
                                            <a href="{{ url('merchandise', $item->slug) }}" class="buy_button d-none">
                                                <p class="mb-0">Lihat lebih banyak</p>
                                            </a>
                                            <p class="mb-0">{{ $item->name }}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- End Product -->
@endsection

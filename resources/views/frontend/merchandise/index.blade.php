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
            width: 100%;
            background-size: cover;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .img_jumbotron {
            width: 100%;
            max-width: 500px;
            position: absolute;
            right: 2rem;
            bottom: 5%;
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
            padding: 6rem;
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
    </style>
@endpush
@section('content')
    <!-- Jumbotron -->
    <section id="jumbotron">
        <img src="/assets/frontend/images/icons/ball.svg" class="ball1" alt="" />
        <img src="/assets/frontend/images/icons/ball.svg" class="ball2" alt="" />
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 z_top">
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
                <div class="col-md-6">
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
                    <input type="hidden" name="category" value="0">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link nav-product active" type="submit">
                            Semua
                        </button>
                    </li>
                </form>
                @foreach ($category as $cat)
                    <form action="{{ route('merchandise') }}" method="GET">
                        <input type="hidden" name="category" value="{{ $cat->id }}">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link nav-product" type="submit">
                                {{ $cat->name }}
                            </button>
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
                                    <div class="col-md-4 col-lg-3">
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

@extends('layouts.frontend.master', ['title' => $merchandise->name])
@push('css')
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        body {
            color: white;
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
            background-repeat: no-repeat;
        }
        #contents {
            min-height: 100vh;
            padding: 6.5rem 0 6rem;
        }
        .button {
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 1rem;
            z-index: 99;
            box-shadow: 0 0 5px #7f89a1!important;
        }
        .button a {
            width: 100%;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }
        .box {
            background: #ffffff;
            border-radius: 30px;
            color: #1e1b1c;
            padding: 3rem 4rem 5rem;
        }
        .category,
        .desc p,
        .discount {
            font-weight: 600;
        }
        h1,
        .price {
            font-weight: 700;
        }
        h1 {
            font-size: 2rem;
        }
        .discount {
            text-decoration: line-through;
            font-size: 0.875rem;
        }
        .discount,
        .desc p {
            color: #55565b;
        }
        .price {
            font-size: 1.125rem;
        }
        .desc p {
            font-size: .875rem;
        }
        .btn_buy {
            background: #e71345;
            border-radius: 8.28421px;
            color: white;
            border: none;
            letter-spacing: -0.005em;
            text-transform: uppercase;
            font-weight: 800;
            padding: 0.5rem 3rem;
            margin-top: 2rem;
            color: white !important;
        }
        .btn_buy:hover {
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1),
        0 4px 6px -4px rgb(0 0 0 / 0.1);
        }
        .slider-for {
            max-height: 500px;
            margin-bottom: 1rem;
        }
        .slider-for .images {
            display: flex;
            justify-content: center;
            width: 22rem !important;
            height: 22rem !important;
        }
        .slider-for .images img {
            object-fit: contain;
            width: 100%;
            height: 100%;
        }
        .slider-nav {
            cursor: pointer;
            /* margin-top: -8rem; */
        }
        .slider-nav .images2 img {
            height: 4.5rem;
            width: 4.5rem;
            object-fit: cover;
        }
        .slider-for2 .images {
            height: 30rem;
            display: flex;
            justify-content: center;
        }
        .slider-for2 .images img {
            height: 100%;
        }

        /* Responsiveness */
        @media only screen and (max-width: 991.98px) {
            .box {
                padding: 3rem 1rem;
            }
            h1 {
                font-size: 1.5rem;
            }
            a.btn_buy {
                font-size: .875rem;
            }
            .slider-for .images {
                width: 18rem !important;
                height: 18rem !important;
            }
        }

        @media only screen and (max-width: 767.98px) {
            .slick-slider .slick-list {
                height: 20rem !important;

            }
            a.btn_buy {
                width: 100% !important;
            }

            .contents {
                margin-top: -12rem !important;
            }
        }
        /* End Responsiveness */
    </style>
@endpush
@section('content')
    <!-- Contents -->
    <section id="contents">
        <div class="container">
            <div class="box d-flex flex-column flex-md-row gap-lg-5 gap-md-4">
                <div class="photo_product">
                    <div class="slider-for slider">
                        @foreach ($merchandise->merchandiseImages as $image)
                            <button class="images border-0 bg-transparent" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                <img src="{{ asset($image->image) }}" alt="" />
                            </button>
                        @endforeach
                    </div>
                    <div class="slider-nav slider">
                        @foreach ($merchandise->merchandiseImages as $image)
                            <div class="images2">
                                <img src="{{ asset($image->image) }}" alt="" />
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="contents">
                    <p class="category mb-2">{{ $merchandise->categoryMerchandise->name }}</p>
                    <h1 class="mb-2 mb-md-3 mb-lg-4">{{ $merchandise->name }}</h1>
                    {{-- <p class="discount mb-0">Rp 75.000</p> --}}

                    {{-- show in rupiah format --}}
                    <p class="price">Rp. {{ number_format($merchandise->price, 0, ',', '.') }}</p>
                    <div class="desc">
                        {!! $merchandise->description !!}
                    </div>
                    <div class="mt-5 d-none d-md-block">
                        <a href="{{ $merchandise->link_marketplace }}" target="_blank" class="btn_buy">BELI SEKARANG!</a>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="slider-for2 slider">
                                @foreach ($merchandise->merchandiseImages as $image)
                                    <button class="images border-0 bg-transparent" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        <img src="{{ asset($image->image) }}" alt="" />
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white button d-md-none">
            <a href="{{ $merchandise->link_marketplace }}" target="_blank" class="btn_buy d-block mt-0 text-center">BELI SEKARANG!</a>
        </div>
    </section>
    <!-- End Contents -->

    @push('js')
        <script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".slider-for").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: ".slider-nav, .slider-for2",
                });

                $(".slider-for2").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    fade: true,
                    asNavFor: ".slider-nav",
                });

                $(".slider-nav").slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: ".slider-for",
                    dots: false,
                    arrows: true,
                    centerMode: false,
                    focusOnSelect: true,
                });
            });
        </script>
    @endpush
@endsection

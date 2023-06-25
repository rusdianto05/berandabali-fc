@extends('layouts.frontend.master', ['title' => 'Article'])
@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        body {
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
            min-height: 100vh;
            background-repeat: no-repeat;
        }

        #article {
            padding: 6.5rem 0 5rem;
        }

        .card_article {
            position: relative;
            border-bottom: 8px solid rgba(254, 192, 45, 0.7) !important;
            overflow: hidden !important;
            border-radius: 25px;
        }

        .article_image {
            position: relative;
            height: 75vh;
            max-height: 500px;
            width: 100%;
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
            background: linear-gradient(90deg,
                    #0a1524 0%,
                    rgba(10, 21, 36, 0.572955) 58.1%,
                    rgba(104, 25, 25, 0.35) 93.87%);
            top: 0;
        }

        .article_content {
            position: absolute;
            display: flex;
            flex-direction: column;
            justify-content: center;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 5rem;
            width: 55%;
        }

        .article_content h1 {
            font-size: 2.5rem !important;
            color: white !important;
            font-family: var(--lilita);
            font-weight: 400;
        }

        .article_content p,
        .article_content a {
            font-weight: 500;
            color: white !important;
        }

        .img_logo {
            filter: brightness(0) invert(1);
            width: 80px;
        }

        .btn_red {
            background: #e71345;
            box-shadow: 0px 4px 4px rgba(255, 255, 255, 0.14);
            border-radius: 12px;
            padding: 0.5rem 2rem;
            width: max-content;
            font-weight: 700 !important;
        }
        .btn_red:hover {
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }

        /* top article */
        .top-article .slick-slide {
            margin: 0 10px;
        }

        #top_article {
            padding: 3rem 0;
        }

        #top_article h1,
        #latest_article h1 {
            color: white;
        }

        #top_article span,
        #top_article h1,
        #latest_article h1,
        #latest_article span {
            font-family: var(--lilita);
            font-size: 2.5rem !important;
        }

        .box_top {
            height: 200px !important;
            background: #f2f2f2;
            border-radius: 15px;
            overflow: hidden;
            display: flex;
            align-items: center;
        }
        .content_top {
            height: 7rem;
        }
        .box_top .img_box img,
        .latest_box .img_latest img {
            transform: scale(1);
            transition: transform 0.3s;
        }

        .box_top:hover .img_box img,
        .latest_box:hover .img_latest img {
            transform: scale(1.2);
        }

        .img_box {
            height: 100% !important;
            width: 100%;
            overflow: hidden;
            border-radius: 12px;
        }

        .img_box img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .box_top h6 {
            font-weight: 800;
            font-size: 1.125rem;
            line-height: 150%;
            color: #1e1b1c;
        }

        .box_top p {
            font-weight: 600;
            font-size: 0.75rem;
            line-height: 153%;
            letter-spacing: 0.005em;
            color: #1e1b1c;
        }

        .box_top img {
            width: 100%;
            height: 11rem;
            object-fit: cover;
            border-radius: 12.8541px;
        }

        .badge_yellow {
            color: white !important;
            background: #fec02d;
            box-shadow: 0px 1.96184px 1.96184px rgba(255, 255, 255, 0.14);
            border-radius: 38.3518px;
            width: max-content;
            padding: 0.25rem 1rem;
        }

        .box_top .link_more {
            color: #e71345;
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0;
        }

        p.date_box {
            font-size: 0.875rem;
            color: #9fa0ab;
        }

        /* end top article */

        /* latest article */
        .latest_box {
            background: #ffffff;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 12px;
            overflow: hidden;
        }

        .latest_box p {
            color: #55565b;
            font-size: 0.875rem;
        }

        .latest_box h6 {
            color: #3d3d3d;
            font-weight: 800;
            font-size: 1.125rem;
            line-height: 1.75rem;
        }

        .latest_box .date_box {
            color: #9fa0ab;
            font-size: 0.75rem;
        }

        .latest_box .link_more {
            font-weight: 600;
            font-size: 0.875rem;
            color: #6276f6;
        }

        .latest_box .content {
            font-size: 0.875rem;
        }
        .img_latest {
            height: 10rem;
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
        }
        .img_latest img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .content_box {
            height: 10rem;
        }

        /* end latest article */

        /* pagination */
        .page-link {
            background-color: #010120 !important;
            border: 1px solid #dfe3e8 !important;
            border-radius: 4px !important;
            color: #ffffff !important;
            font-weight: 700 !important;
        }

        .page-link.active {
            background-color: #010120 !important;
            border: 1px solid #5e72e4 !important;
            border-radius: 4px !important;
            color: #5e72e4 !important;
            font-weight: 700 !important;
        }
        /* end pagination */

        /* Responsive */
        @media only screen and (min-width: 1400px) {
            .content_box {
                height: 8.5rem;
            }
        }
        @media only screen and (max-width: 1199.98px) {
            /* first article */
            .article_content {
                padding: 3rem;  
                width: 100%;
            }
            .card_article {
                max-height: 21rem;
            }
            .article_content h1 {
                font-size: 1.75rem !important;
            }
            .img_logo {
                width: 60px;
            }
            .article_content p,
            .article_content a {
                font-size: 0.875rem;
            }
            /* end first article */

            /* top article */
            #top_article {
                padding: 2rem 0;
            }
            #top_article span,
            #top_article h1,
            #latest_article h1,
            #latest_article span {
                font-size: 1.75rem !important;
                text-align: center;
            }
            .box_top h6 {
                font-size: .875rem;
            }
            .box_top p {
                font-size: 0.625rem;
            }
            /* end top article */

            /* latest article */
            .latest_box img {
                height: 100%;
                object-fit: cover;
            }
            .latest_box h6 {
                font-size: 0.875rem;
            }
            .latest_box p {
                font-size: .75rem;
            }
            .latest_box .date_box {
                font-size: .7rem;
            }
            .latest_box .content,
            .latest_box .link_more {
                font-size: 0.75rem;
            }
            .content_box {
                height: 7rem;
            }
            /* end latest article */
        }

        @media only screen and (max-width: 575.98px) {
            .content_box {
                height: max-content;
            }
            .slick-next {
                right: 0 !important;
            }
            .slick-prev {
                left: 0 !important;
            }
            .box_top .link_more {
                font-size: .75rem;
            }       
        }
        @media only screen and (max-width: 399.98px) {
            .content_top {
                height: 7rem;
            }
        }
        /* End Responsive */
    </style>
@endpush
@section('content')
    <!-- Article -->
    <div class="container">
        <div id="article">
            <!-- First Article -->
            <section class="card_article mb-4">
                <a href="{{ url('article', $slider_article->slug) }}">
                    <div class="article_image">
                        <img src="{{ asset($slider_article->image) }}" width="100%" alt="" />
                    </div>
                    <div class="article_content">
                        <img src="/assets/frontend/images/logo.svg" class="img_logo mb-4" alt="" />
                        <h1>{{ $slider_article->title }}</h1>
                        <a href="{{ url('article', $slider_article->slug) }}" class="btn_red mt-4">Baca lebih lanjut</a>
                    </div>
                </a>
            </section>
            <section id="top_article" class="mb-4">
                <h1 class="mb-5">TOP <span class="text_primary">ARTICLE</span></h1>
                <div class="top-article slider">
                    @foreach ($top_article as $top)
                        <div class="slide">
                            <div class="box_top">
                                <a href="{{ url('article', $top->slug) }}" class="row">
                                    <div class="col-5 col-lg-4 col-xl-5 p-4 pe-2">
                                        <div class="img_box">
                                            <img src="{{ asset($top->image) }}" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-7 col-lg-8 p-4 ps-2 col-xl-7">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="badge_yellow">{{ $top->categoryArticle->name }}</p>
                                            <p class="date_box">{{ $top->created_at->format('d M, Y') }}</p>
                                        </div>
                                        <div class="content_top">
                                            <h6>{{ Str::limit($top->title, 50, '...') }}</h6>
                                            <p>
                                                {!! Str::limit($top->content, 90, '...') !!}
                                            </p>
                                        </div>
                                        <div class="text-end">
                                            <p class="link_more">See More</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- Latest Article -->
            <section id="latest_article">
                <h1 class="mb-5">LATEST <span class="text_primary">ARTICLE</span></h1>
                <div class="row">
                    @foreach ($article as $item)
                        <div class="col-sm-6 col-lg-4 col-xl-3 mb-4">
                            <div class="latest_box p-3">
                                <a href="{{ url('article', $item->slug) }}">
                                    <div class="img_latest">
                                        <img src="{{ asset($item->image) }}" alt="" />
                                    </div>
                                    <div class="mt-2">
                                        <div class="content_box">
                                            <p class="date_box mb-1">{{ $top->created_at->format('d M, Y') }}</p>
                                            <h6>{{ Str::limit($item->title, 44, '...') }}</h6>
                                            <p class="content">
                                                {!! Str::limit($item->content, 80, '...') !!}
                                            </p>
                                        </div>
                                        <div class="text-end">
                                            <p class="link_more mb-0">See More</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </section>
            <!-- End Latest Article -->

            <!-- Pagination -->
            <nav aria-label="Page navigation example" class="bg-transparent mt-5">
                <ul class="pagination gap-2 align-items-center justify-content-center">
                    {{ $article->links() }}
                    {{-- <li class="page-item disabled">
                        <a class="page-link">&lt;</a>
                    </li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">&gt;</a>
                    </li> --}}
                </ul>
            </nav>
            <!-- End Pagination -->
        </div>
    </div>
    <!-- End Article -->
@endsection
@push('js')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".top-article").slick({
                slidesToShow: 2.5,
                slidesToScroll: 1,
                centerMode: false,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                dots: false,
                pauseOnHover: false,
                responsive: [
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
                            slidesToShow: 1.25,
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

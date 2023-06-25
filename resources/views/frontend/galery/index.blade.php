@extends('layouts.frontend.master', ['title' => 'Galeri'])
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap");

        * {
            color: white;
        }

        body {
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
            background-repeat: no-repeat;
        }

        #jumbotron,
        #gallery {
            margin-bottom: 6rem;
        }

        #jumbotron {
            margin-top: 4rem;
        }

        /* Jumbotron */
        .img_jumbotron {
            position: relative;
            height: 100vh;
        }

        .img_jumbotron::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: linear-gradient(180deg,
                    rgba(90, 25, 25, 0.15) 10%,
                    rgba(31, 30, 82, 0.82) 52.84%,
                    #05033a 100%);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .img_jumbotron img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .carousel-indicators button {
            width: 0.75rem !important;
            height: 0.75rem !important;
            border-radius: 100% !important;
            margin-right: 0.75rem !important;
        }

        /* End Jumbotron */

        /* Galeri */
        .box {
            background: linear-gradient(180deg, #30167b 15.1%, #262395 61.72%, rgba(42, 24, 95, 0.94) 100%);
            border-radius: 20px;
            padding: 2rem;
        }

        .box h1 {
            font-weight: 700;
            font-size: 2.25rem;
            font-family: "Lato", sans-serif;
        }

        .box p {
            font-weight: 600;
            font-size: 1.125rem;
        }

        #gallery {
            -webkit-column-count: 3;
            -moz-column-count: 3;
            column-count: 3;
            -webkit-column-gap: 20px;
            -moz-column-gap: 20px;
            column-gap: 20px;
        }

        @media (max-width: 800px) {
            #gallery {
                -webkit-column-count: 2;
                -moz-column-count: 2;
                column-count: 2;
                -webkit-column-gap: 20px;
                -moz-column-gap: 20px;
                column-gap: 20px;
            }
        }

        @media (max-width: 600px) {
            #gallery {
                -webkit-column-count: 1;
                -moz-column-count: 1;
                column-count: 1;
            }
        }

        #gallery img,
        #gallery .box {
            width: 100%;
            height: auto;
            margin: 4% auto;
            border-radius: 25px;
            -webkit-transition: all 0.2s;
            transition: all 0.2s;
        }

        .modal-img,
        .model-vid {
            width: 100%;
            height: auto;
        }

        .modal-body {
            padding: 0px;
        }

        /* End Galeri */
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
                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="5000">
                        <div class="img_jumbotron">
                            <img src="{{ asset($slider->image) }}" alt="" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Jumbotron -->

    <!-- Galeri -->
    <div id="gallery" class="container">
        <div class="box">
            <h1 class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h1>
            <p>Lorem ipsum nanana</p>
        </div>
        @foreach ($galeries as $gallery)
            <img src="{{ asset($gallery->image) }}" class="img-responsive" />
        @endforeach
    </div>
    {{-- add pagination bootstrap 5 --}}
    <div class="d-flex justify-content-center align-items-center" style="background-color: transparent;">
        {{ $galeries->links() }}</div>
    <!-- End Galeri -->
@endsection

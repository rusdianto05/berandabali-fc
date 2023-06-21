@extends('layouts.frontend.master', ['title' => $article->title])
@push('css')
    <style>
        body {
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
            min-height: 100vh;
            background-repeat: no-repeat;
            color: white;
        }

        .image_article {
            height: 450px;
            object-fit: cover;
            border-radius: 10px;
        }

        #detail_article {
            padding: 2.5rem 0 5rem;
        }

        .content p {
            text-align: justify;
            line-height: 1.5rem;
            letter-spacing: 0.02em;
        }

        .date {
            font-weight: 500;
        }

        h1 {
            font-weight: 800;
            font-size: 2rem;
        }

        /* Responsiveness */
        @media only screen and (max-width: 1199.98px) {
            .image_article {
                height: 275px;
            }
            h1 {
                font-size: 1.75rem;
            }
        }
        @media only screen and (max-width: 991.98px) {
            .image_article {
                height: 250px;
            }
            h1 {
                font-size: 1.5rem;
            }
            .content p,
            .date {
                font-size: .875rem;
                line-height: 1.25rem;
            }
        }

        @media only screen and (max-width: 767.98px) {
            .image_article {
                height: 200px;
            }
        }
        /* End Responsiveness */
    </style>
@endpush
@section('content')
    <!-- Detail Article -->
    <section id="detail_article">
        <div class="container">
            <img src="{{ asset($article->image) }}" class="image_article" width="100%" alt="" />
            <p class="date mt-3 mb-4">{{ $article->created_at->format('d M, Y') }}</p>
            <h1 class="text-center mb-5">{{ $article->title }}</h1>
            <div class="content">
                {!! $article->content !!}
            </div>
        </div>
    </section>
    <!-- End Detail Article -->
@endsection

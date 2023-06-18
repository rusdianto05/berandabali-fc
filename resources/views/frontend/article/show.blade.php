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
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }

        #detail_article {
            padding: 6.5rem 0 5rem;
        }

        .content p {
            text-align: justify !important;
            font-weight: 600 !important;
            line-height: 1.5rem !important;
            letter-spacing: 0.02em !important;
        }

        .date {
            font-weight: 500;
        }

        h1 {
            font-weight: 800;
            font-size: 2rem;
        }
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

@extends('layouts.frontend.master', ['title' => 'Team'])
@push('css')
    <style>
        body {
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
            background-repeat: no-repeat;
        }

        #detail {
            position: relative;
            min-height: 100vh;
        }

        .img_jumbotron {
            padding-top: 4rem;
        }

        #detail::before {
            background: linear-gradient(180deg,
                    rgba(225, 0, 0, 0.16) -16.66%,
                    rgba(49, 27, 74, 0.48) 0.72%,
                    rgba(31, 30, 82, 0.66) 45.07%,
                    #05033a 100%);
            content: "";
            position: absolute;
            width: 100%;
            background-repeat: no-repeat;
            height: 100%;
        }

        .contents {
            position: absolute;
            top: 6rem;
            left: 0;
            padding: 0 2rem;
            color: white;
            width: 100%;
        }

        .contents h1 {
            font-size: 2.5rem;
            font-family: var(--lilita);
        }

        .border_white {
            position: absolute;
            content: "";
            width: 100%;
            height: 3px;
            background-color: white;
            bottom: 0;
        }

        .links {
            position: relative;
            padding-bottom: 1.75rem;
            width: max-content;
        }

        .circle_white {
            position: absolute;
            content: "";
            width: 0.875rem;
            height: 0.875rem;
            background-color: white;
            border-radius: 50%;
            bottom: -5px;
            right: 0;
        }

        table td {
            padding: 2rem 4rem 2rem 1rem;
            border: 2px solid rgba(255, 255, 255, 0.25);
        }

        table {
            margin-top: 3rem;
        }

        table tr.no_border_top td {
            border-top: none !important;
        }

        table tr.no_border_bottom td {
            border-bottom: none !important;
        }

        table tr.no_border_top td:nth-child(1),
        table tr.no_border_bottom td:nth-child(1) {
            border-left: none !important;
        }

        table tr.no_border_top td:nth-child(3),
        table tr.no_border_bottom td:nth-child(3) {
            border-right: none !important;
        }

        table td p {
            letter-spacing: 0.005em;
            font-weight: 500;
            font-size: 1.125rem;
        }

        table td h1 {
            font-weight: 800;
            letter-spacing: 0.005em;
            font-size: 1.25rem !important;
            font-family: var(--plusjakarta) !important;
        }

        .no_player {
            font-weight: 800 !important;
            font-size: 8rem !important;
            text-transform: uppercase !important;
            font-family: var(--plusjakarta) !important;
        }

        .position_player {
            font-weight: 700;
            font-size: 1.25rem;
            line-height: 153%;
            letter-spacing: 0.005em;
        }
    </style>
@endpush
@section('content')
    <!-- Detail Player -->
    <section id="detail">
        <div class="img_jumbotron">
            <img src="{{ asset('assets/frontend/images/detail_team.png') }}" width="100%" alt="" />
        </div>
        <div class="contents">
            <div class="container">
                <div class="links">
                    <h1 class="mb-3">{{ $team->name }}</h1>
                    <div class="d-flex gap-3 align-items-center">
                        <a href="www.facebook.com">
                            <img src="/assets/frontend/images/icons/facebook.svg" width="40" alt="" />
                        </a>
                        <a href="www.twitter.com">
                            <img src="/assets/frontend/images/icons/twitter.svg" width="40" alt="" />
                        </a>
                        <a href="www.instagram.com">
                            <img src="/assets/frontend/images/icons/instagram.svg" width="40" alt="" />
                    </div>
                    </a>
                    <div class="border_white"></div>
                    <div class="circle_white"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <table>
                        <tr class="no_border_top">
                            <td>
                                <p class="mb-2">Tempat lahir</p>
                                <h1>{{ $team->born_place }}</h1>
                            </td>
                            <td>
                                <p class="mb-2">Tinggi</p>
                                <h1>{{ $team->height }} Cm</h1>
                            </td>
                            <td>
                                <p class="mb-2">Tanggal Bergabung</p>
                                <h1>{{ date('d M Y', strtotime($team->joined_date)) }}</h1>
                            </td>
                        </tr>
                        <tr class="no_border_bottom">
                            <td>
                                <p class="mb-2">Tanggal Lahir</p>
                                <h1>{{ date('d M Y', strtotime($team->born_date)) }}</h1>
                            </td>
                            <td>
                                <p class="mb-2">Berat</p>
                                <h1>{{ $team->weight }} Kg</h1>
                            </td>
                            <td>
                                <p class="mb-2">No Punggung</p>
                                <h1>{{ $team->number }}</h1>
                            </td>
                        </tr>
                    </table>
                    <div class="text-center">
                        <h1 class="no_player mb-0">{{ $team->number }}</h1>
                        <p class="mb-0 position_player">{{ $team->position }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Detail Player -->
@endsection
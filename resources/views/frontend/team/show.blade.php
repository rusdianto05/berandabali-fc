@extends('layouts.frontend.master', ['title' => 'Team'])
@push('css')
    <style>
        body {
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
            background-repeat: no-repeat;
            height: 100% !important;
        }
        
        #detail {
            min-height: 40rem;
            position: relative;
        }

        .img_jumbotron {
            padding-top: 4rem;
        }
        .img_jumbotron img {
            height: 100% !important;
            object-fit: cover;
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
            margin-top: 4rem;
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

        /* Responsiveness */
        @media only screen and (max-width: 1199.98px) {
            .position_player,
            table td h1 {
                font-size: 1rem !important;
            }
            .contents h1 {
                font-size: 2rem;
            }
            .links {
                padding-bottom: 1.25rem;
            }
            table td p {
                font-size: .875rem;
            }
            table td {
                padding: 1rem;
            }
            .no_player {
                font-size: 6rem !important;
            }
            table {
                width: 70% !important;
            }
            #detail {
                min-height: 35rem;
            }
        }

        @media only screen and (max-width: 767.98px) {
            table {
                width: 100% !important;
            }
            #detail {
                min-height: 45rem;
            }
        }
        /* End Responsiveness */
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
                        {{-- show total goal --}}
                        @if ($team->position == 'Penjaga Gawang')
                            <span class="position_player">Clean Sheet</span>: <span
                                class="position_player">{{ $team->clean_sheet }}
                            </span>
                            <span class="position_player">Saves</span>: <span
                                class="position_player">{{ $team->saves }}</span>
                        @else
                            <span class="position_player">Goal </span>: <span
                                class="position_player">{{ $team->goal }}</span>
                            <span class="position_player">Assist</span>: <span
                                class="position_player">{{ $team->assist }}</span>
                        @endif
                    </div>
                    </a>
                    <div class="border_white"></div>
                    <div class="circle_white"></div>
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-md-between align-md-items-center">
                    <table width="60%">
                        <tr class="no_border_top">
                            <td width="30%">
                                <p class="mb-2">Tempat lahir</p>
                                <h1>{{ $team->born_place }}</h1>
                            </td>
                            <td width="30%">
                                <p class="mb-2">Tinggi</p>
                                <h1>{{ $team->height }} Cm</h1>
                            </td>
                            <td width="40%">
                                <p class="mb-2">Tanggal Bergabung</p>
                                <h1>{{ date('d M Y', strtotime($team->joined_date)) }}</h1>
                            </td>
                        </tr>
                        <tr class="no_border_bottom">
                            <td width="30%">
                                <p class="mb-2">Tanggal Lahir</p>
                                <h1>{{ date('d M Y', strtotime($team->born_date)) }}</h1>
                            </td>
                            <td width="30%">
                                <p class="mb-2">Berat</p>
                                <h1>{{ $team->weight }} Kg</h1>
                            </td>
                            <td width="40%">
                                <p class="mb-2">Penampilan</p>
                                <h1>{{ $team->apperances }} Match</h1>
                            </td>
                        </tr>
                    </table>
                    <div class="text-center mt-4 mt-md-0">
                        <h1 class="no_player mb-0">{{ $team->number }}</h1>
                        <p class="mb-0 position_player">{{ $team->position }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Detail Player -->
@endsection

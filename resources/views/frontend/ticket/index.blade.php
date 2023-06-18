@extends('layouts.frontend.master', ['title' => 'Tiket Saya'])
@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        body {
            color: white;
            background: linear-gradient(180deg, #0e0036 24.66%, #020050 61.72%, #000000 100%);
        }

        /* Jumbotron */
        #jumbotron {
            background: linear-gradient(180deg, #19184b 0%, #030226 100%);
            background-repeat: no-repeat;
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
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

        .img_match {
            position: absolute;
            width: 60%;
            left: 0;
            bottom: -7.1375%;
        }

        .img_ball {
            position: absolute;
            left: -15rem;
            top: -5rem;
            width: 500px;
        }

        /* End Jumbotron */

        /* New Match */
        #new_match {
            padding: 7rem 0;
        }

        #new_match h1,
        #new_match h1 span,
        #schedule h1,
        #schedule h1 span {
            font-family: var(--lilita);
            font-size: 2.5rem !important;
        }

        .name_club {
            font-weight: 800 !important;
            font-size: 1.25rem;
            line-height: 150%;
            letter-spacing: 0.1em;
        }

        .img_logo {
            width: 200px;
        }

        .score_text,
        .score_text span {
            font-weight: 800 !important;
            font-size: 5rem;
        }

        .score_text span {
            padding: 0 1rem;
            color: #9fa0ab;
        }

        .badge_status {
            background: rgba(61, 164, 145, 0.5);
            border: 1.65846px solid #5cbaba;
            border-radius: 23.2184px;
            width: max-content;
            margin: 1.5rem auto;
            padding: 0.25rem 1rem;
            font-weight: 700;
            font-size: 1.125rem;
            color: #75e4e4;
        }

        .date {
            font-weight: 700;
            color: #9fa0ab;
        }

        .btn_primary {
            position: absolute;
        }

        /* End New Match */

        /* Schedule */
        #schedule {
            padding: 3rem 0 6rem;
        }

        #schedule h1 {
            margin-bottom: 3.5rem;
        }

        .box_schedule {
            background-color: #ffffff;
            background-image: url("/assets/frontend/images/schedule_bg.svg");
            padding: 1rem;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 25px;
            width: 100%;
            margin-bottom: 2.25rem;
        }

        .image {
            width: 80px;
        }

        .box_schedule h2 {
            font-family: var(--lilita);
            color: #1e1b1c;
            letter-spacing: 0.06em;
            font-size: 1.5rem;
        }

        .box_schedule p {
            font-weight: 500;
            color: #55565b;
            font-size: 0.875rem;
        }

        .border_bottom {
            border-bottom: 2px solid #9fa0ab;
        }

        .text_red {
            color: #e71345 !important;
        }

        a p {
            letter-spacing: 0.05em;
            font-weight: 600 !important;
        }

        /* End Schedule */
    </style>
@endpush
@section('content')
    <!-- Jumbotron -->
    <section id="jumbotron" class="container-fluid px-5">
        <div class="img_match">
            <img src="/assets/frontend/images/match.png" width="100%" alt="" />
        </div>
        <div class="img_ball">
            <img src="/assets/frontend/images/icons/ball.svg" width="100%" alt="" />
        </div>
        <div class="ms-auto w-50">
            <h1 class="title">
                BERANDA BALI <br />
                FOOTBALL CLUB
            </h1>
            <p class="subtitle mt-3 mb-5">
                Pertandingan yang akan diikuti oleh Beranda Bali FC dan hasil pertandingan terbaru dari Beranda Bali FC
                akan ditampilkan pada halaman ini beserta dengan jadwal pertandingan selanjutnya.
            </p>
            <a href="#schedule" class="btn_primary">Lihat lebih banyak</a>
        </div>
    </section>
    <!-- End Jumbotron -->

    <!-- New Match -->
    <section id="new_match" class="container-fluid px-5" style="background-color: #FFFFFF">
        {{-- add  --}}
        <table id="table-team-match" class="table table-striped border rounded gy-5 gs-7">
            <thead>
                <tr class="fw-bolder fs-6 text-gray-800 px-7">
                    <th width="3%">No</th>
                    <th>Tanggal</th>
                    <th>Nama Pemesan</th>
                    <th>No HP</th>
                    <th>Total Harga</th>
                    <th>Url Pembayaran</th>
                    <th>Status</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </section>
    <!-- End New Match -->
@endsection
@push('js')
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(() => {
            var table = $('#table-team-match').DataTable({
                ordering: false,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('user.ticket.index') }}",
                language: {
                    "paginate": {
                        "next": "<i class='fa fa-angle-right'>",
                        "previous": "<i class='fa fa-angle-left'>"
                    },
                    "loadingRecords": "Loading...",
                    "processing": "Processing...",
                },
                columns: [{
                        "data": null,
                        "sortable": false,
                        "searchable": false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'total_price',
                        name: 'total_price',
                        render: function(data, type, row) {
                            return 'Rp. ' + data;
                        }

                    },
                    {
                        data: 'payment_url',
                        name: 'payment_url',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        })
    </script>
@endpush

@extends('layouts.frontend.master', ['title' => 'Tiket Saya'])
@push('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        body {
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

        h1 {
            font-size: 1.75rem !important;
            font-weight: 800;
            margin-bottom: 2rem;
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

        table th {
            font-size: .875rem;
        }

        /* End Schedule */

        /* Sidebar */
        .box_sidebar {
            background: #FFFFFF;
            border: 1px solid #EFEFEF;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.25);
            border-radius: 15px;
            padding: 2rem;
        }

        .box_sidebar a,
        .box_sidebar button {
            display: block;
            color: #000000;
            font-weight: 600;
            padding-bottom: .5rem;
            margin-bottom: .875rem;
            border-bottom: 2px solid #EDEDED;
        }

        .profile_img {
            width: 5rem;
            height: 5rem;
            border-radius: 100%;
            object-fit: cover;
        }

        .box_sidebar .active p {
            color: var(--blue);
        }

        .box_sidebar .active img {
            filter: invert(54%) sepia(86%) saturate(4049%) hue-rotate(215deg) brightness(99%) contrast(94%);
        }

        /* End Sidebar */

        /* Modal */
        .modal-body p {
            font-size: .875rem;
        }

        .btn_logout {
            background-color: #e71345 !important;
            padding: .5rem 1.25rem;
            border-radius: 8px;
            color: #FFFFFF !important;
            font-size: .875rem;
            font-weight: 600;
            border: none !important;
            cursor: pointer;
            margin-bottom: 0 !important;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }

        .btn_cancel {
            background-color: white !important;
            padding: .5rem 1.25rem;
            border-radius: 8px;
            color: #e71345 !important;
            font-size: .875rem;
            font-weight: 600;
            border: none !important;
            cursor: pointer;
            box-shadow: none !important;
            margin-bottom: 0 !important;
        }

        .modal-footer {
            padding: .5rem !important;
        }

        .modal-header {
            padding: .75rem 1rem !important;
        }

        .modal-header h1 {
            font-size: 1.125rem !important;
        }

        /* End Modal */
    </style>
@endpush
@section('content')
    <!-- New Match -->
    <section id="new_match" style="background-color: #FFFFFF">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="box_sidebar">
                        <div class="d-flex flex-column gap-2 justify-content-center mb-4 text-center align-items-center">
                            <img src="{{ asset(Auth::guard('users')->user()->avatar ?? '/assets/frontend/images/icons/profile.svg') }}"
                                class="profile_img" />
                            <p class="text-dark fw-bold">{{ Auth::guard('users')->user()->name }}</p>
                        </div>
                        <a href="{{ route('profile.show') }}">
                            <div class="d-flex gap-3 align-items-center">
                                <img src="{{ asset('/assets/frontend/images/icons/edit-profile.svg') }}" width="20" />
                                <p class="mb-0">Profil Saya</p>
                            </div>
                        </a>
                        <a href="{{ route('user.ticket.index') }}" class="active">
                            <div class="d-flex gap-3 align-items-center">
                                <img src="{{ asset('/assets/frontend/images/icons/transaction.svg') }}" width="20" />
                                <p class="mb-0">Tiket Saya</p>
                            </div>
                        </a>
                        <button data-bs-toggle="modal" data-bs-target="#logoutModal"
                            class="d-flex gap-3 align-items-center w-100 px-1 border-0 bg-transparent">
                            <img src="{{ asset('/assets/frontend/images/icons/logout.svg') }}" class="img_red"
                                width="20" />
                            <p class="mb-0 text_primary">Logout</p>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin logout dari akun ini? Semua sesi yang sedang aktif akan
                                            ditutup dan Anda harus masuk kembali untuk mengaksesnya.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn_cancel" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('logout.user') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn_logout">
                                                Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 ps-5">
                    <h1>Tiket Saya</h1>
                    <table id="table-team-match" class="table table-striped border rounded gy-5 gs-7">
                        <thead>
                            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                <th width="3%">No</th>
                                <th>Tanggal</th>
                                <th>Nama Pemesan</th>
                                <th>No HP</th>
                                <th>Total Harga</th>
                                <th>Booking ID</th>
                                <th>Status</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
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
                // disable pagination in above demo for performance
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
                        name: 'phone',
                        render: function(data, type, row) {
                            return '+62' + data ?? 'Belum diisi';
                        }
                    },
                    {
                        data: 'total_price',
                        name: 'total_price',
                        render: function(data, type, row) {
                            // return 'Rp. ' + add rupiah format
                            return 'Rp. ' + data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        }

                    },
                    {
                        data: 'booking_id',
                        name: 'booking_id',
                        render: function(data, type, row) {
                            return data ?? 'Belum ada pembayaran';
                        }
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

@extends('layouts.master', ['title' => 'Pembelian Tiket'])
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1"> Data Pembelian Tiket</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Pembelian Tiket</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">List Pembelian Tiket</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header d-flex align-items-center justify-content-end border-0 pt-6">
                        <div class="">
                            {{-- <a type="a" class="btn btn-sm btn-primary" id="btn_add_permission"
                                href="{{ route('ticket-exchange.create') }}">+
                                Pembelian</a> --}}
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table id="table-ticket-match" class="table table-striped border rounded gy-5 gs-7">
                            <thead>
                                <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                    <th width="3%">No</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Kode Booking</th>
                                    <th>Nama Pemesan</th>
                                    <th>No HP</th>
                                    <th>Total Harga</th>
                                    <th>Total Tiket</th>
                                    <th>Link Pembayaran</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Modals-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Wrapper-->
@endsection
@push('js')
    <script>
        $(document).ready(() => {
            var table = $('#table-ticket-match').DataTable({
                ordering: false,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ route('transaction.index') }}",
                    type: 'GET',
                },
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
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data, type, row) {
                            return moment(data).format('DD MMMM YYYY');
                        }
                    },
                    {
                        data: 'booking_id',
                        name: 'booking_id',
                        render: function(data, type, row) {
                            return data ? data : 'Belum Dibayar';
                        }

                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                        render: function(data, type, row) {
                            return '+62' + data;
                        }
                    },
                    {
                        data: 'total_price',
                        name: 'total_price',
                        render: function(data, type, row) {
                            return 'Rp. ' + data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }
                    },
                    {
                        data: 'total_ticket',
                        name: 'total_ticket',
                    },
                    {
                        data: 'payment_url',
                        name: 'payment_url',
                        render: function(data, type, row) {
                            return '<a href="' + data + '" target="_blank">Link Pembayaran</a>';
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

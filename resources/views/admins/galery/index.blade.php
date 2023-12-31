@extends('layouts.master', ['title' => 'Galeri'])
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
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1"> Daftar Galeri</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Galeri</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">List Galeri</a>
                        </li>

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
                        <!--begin::Card title-->
                        {{-- <div class="card-title">
                        </div> --}}

                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <x-alert.alert-validation />
                        <div class="mb-10">
                            <form action="{{ route('galery.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="file" name="image" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="is_slider" class="form-control" required>
                                            <option value="0">Galeri</option>
                                            <option value="1">Slider</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="">
                            <a type="a" class="btn btn-sm btn-primary" id="btn_add_permission"
                                href="{{ route('galery.create') }}">+ Galeri</a>
                            <!--end::Primary button-->
                        </div> --}}
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="table-galery" class="table table-striped border rounded gy-5 gs-7">
                                <thead>
                                    <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                        <th width="3%">No</th>
                                        <th>Foto</th>
                                        <th width="20%">Status</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
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
            var table = $('#table-galery').DataTable({
                ordering: false,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('galery.index') }}",
                language: {
                    paginate: {
                        next: "<i class='fa fa-angle-right'>",
                        previous: "<i class='fa fa-angle-left'>"
                    },
                    loadingRecords: "Loading...",
                    processing: "Processing..."
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
                        data: 'image',
                        name: 'image',
                        render: function(data, type, row) {
                            return '<img src="{{ asset('/') }}' + data +
                                '" class="img-fluid rounded" style="width: 100px; height: 100px;">';
                        }
                    },
                    {
                        data: 'is_slider',
                        name: 'is_slider',
                        responsivePriority: -1,
                        render: function(data, type, row) {
                            if (data == 1) {
                                return '<span class="badge badge-light-success">Slider</span>';
                            } else {
                                return '<span class="badge badge-light-danger">Galeri</span>';
                            }
                        }
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true,
                        responsivePriority: -1
                    }
                ]
            });
        });
    </script>
@endpush

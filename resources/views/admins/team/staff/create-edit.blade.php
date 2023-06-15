@extends('layouts.master', ['title' => 'Staff'])
@section('content')
    <!--begin::Content-->
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
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Data Staff</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->

                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Data Staff</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">
                            {{ request()->routeIs('staff.create') ? 'Tambah Staff' : 'Edit Staff' }}</li>
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
            <div id="kt_content_container" class="container-fluid">
                <!--begin::Contacts App- Add New Contact-->
                <div class="row g-7">
                    <!--begin::Content-->
                    <div class="col-xl-12">
                        <!--begin::Contacts-->
                        <div class="card card-flush h-lg-100" id="kt_contacts_main">
                            <!--begin::Card header-->
                            <div class="card-header pt-7" id="kt_chat_contacts_header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                    <span class="svg-icon svg-icon-1 me-2">
                                    </span>
                                    <!--end::Svg Icon-->

                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-5">
                                <!--begin::Form-->
                                <x-alert.alert-validation />
                                <form
                                    action="{{ request()->routeIs('staff.create') ? route('staff.store') : route('staff.update', @$staff->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <x-form.put-method />
                                    <!--begin::Input group-->

                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">Nama</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Masukkan nama"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="name"
                                            value="{{ @$staff->name ?? old('name') }}" />
                                        <!--end::Input-->
                                    </div>
                                    <input type="hidden" name="type" value="{{ @$staff->type ?? 'Staff' }}">
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">Jabatan</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Masukkan Posisi Staff"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="position"
                                            value="{{ @$staff->position ?? old('position') }}" />
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">Tempat Lahir</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Masukkan Tempat Lahir"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="born_place"
                                            value="{{ @$staff->born_place ?? old('born_place') }}" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">Tanggal Lahir</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Masukkan Tanggal Lahir"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="date" class="form-control form-control-solid" name="born_date"
                                            value="{{ @$staff->born_date ?? old('born_date') }}" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">Berat</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Masukkan Berat"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" class="form-control form-control-solid" name="weight"
                                            value="{{ @$staff->weight ?? old('weight') }}" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">Tinggi Badan</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Masukkan Tinggi Badan"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" class="form-control form-control-solid" name="height"
                                            value="{{ @$staff->height ?? old('height') }}" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">Tanggal Bergabung Tim</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Masukkan Tanggal Bergabung Tim"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="date" class="form-control form-control-solid" name="joined_date"
                                            value="{{ @$staff->joined_date ?? old('joined_date') }}" />
                                        <!--end::Input-->
                                    </div>
                                    <div class="fv-row mb-7">
                                        <x-form.image-upload label="Foto" name="image" id="image"
                                            :value="@$staff->image ?? null" />
                                    </div>

                                    <!--end::Input group-->
                                    <!--begin::Separator-->
                                    <div class="separator mb-6"></div>
                                    <!--end::Separator-->
                                    <!--begin::Action buttons-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <a href="{{ route('article.index') }}">
                                            <button type="button" data-kt-contacts-type="cancel"
                                                class="btn btn-sm btn-light me-3">Cancel</button>
                                        </a>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button type="submit" data-kt-contacts-type="submit"
                                            class="btn btn-sm btn-primary">
                                            <span class="indicator-label">Save</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Action buttons-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Contacts-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Contacts App- Add New Contact-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

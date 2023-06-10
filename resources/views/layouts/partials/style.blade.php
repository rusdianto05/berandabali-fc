  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title> {{ @$title ? $title . ' | ' : '' }} {{ env('APP_NAME') }}</title>
  <meta charset="utf-8" />
  <meta name="description" content="{{ env('APP_NAME') }}">
  <meta name="author" content="{{ env('APP_NAME') }}">
  <meta name="robots" content="noindex, nofollow">

  <!-- Open Graph Meta -->
  <meta property="og:title" content="{{ env('APP_NAME') }}">
  <meta property="og:site_name" content="{{ env('APP_NAME') }}">
  <meta property="og:description" content="{{ env('APP_NAME') }}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="canonical" href="jaktivity" />
  <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.svg') }}" />
  <!--begin::Fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
  <!--end::Fonts-->
  <!--begin::Page Vendor Stylesheets(used by this page)-->
  <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
  <!--end::Page Vendor Stylesheets-->
  <!--begin::Global Stylesheets Bundle(used by all pages)-->
  <!--end::Global Stylesheets Bundle-->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--end::Fonts-->
  <!--begin::Page Vendor Stylesheets(used by this page)-->
  <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
      type="text/css" />
  <!--end::Page Vendor Stylesheets-->
  <!--begin::Page Vendor Stylesheets(used by this page)-->
  <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />

  <link href="{{ url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css') }}"
      rel="stylesheet" />

  <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
  <!--end::Page Vendor Stylesheets-->

  {{-- <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
      /* .table td:first-child,
      .table th:first-child,
      .table tr:first-child {
          padding-left: 10px;
      } */

      /* table.dataTable td.dt-control::before {
          display: none !important;
      } */
      .header-fixed.toolbar-fixed .wrapper {
          padding-top: 5rem !important;
      }

      .aside.aside-dark .aside-logo {
          background-color: #1265C1;
      }

      .aside-menu {
          background: linear-gradient(174.06deg, #1755CE -14.74%, #009E94 95.3%);
      }

      .aside-footer {
          background-color: #009E94;
      }

      .aside-dark .menu .menu-item .menu-section,
      .menu-title,
      .btn-label {
          color: #fff !important;
      }

      ` .aside-dark .menu .menu-item .menu-link,
      .aside-dark .menu .menu-item .menu-link.active {
          color: #9899ac;
      }

      .aside-dark .menu .menu-item .menu-link:hover:not(.disabled):not(.active),
      .aside-dark .menu .menu-item.hover>.menu-link:not(.disabled):not(.active),
      .aside-dark .menu .menu-item .menu-link.active {
          background-color: #2d4e91 !important;
      }

      .aside-dark .hover-scroll-overlay-y {
          scrollbar-color: #2d4e91 transparent;
      }

      .btn-label {
          font-size: 13px
      }

      @media (min-width: 991px) {
          .post.d-flex.flex-column-fluid {
              margin-top: 4rem !important;
          }
      }

      @media (max-width: 991px) {
          .toolbar {
              display: none !important;
          }

          #kt_content_container {
              margin-top: 1rem !important;
          }
      }
  </style>

  @stack('css')

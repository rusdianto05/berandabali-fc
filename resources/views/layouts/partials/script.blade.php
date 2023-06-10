<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ url('https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

{{-- 
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js" type="text/javascript"></script> --}}
<!--end::Global Javascript Bundle-->
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<!--end::Page Custom Javascript-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
{{-- <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script> --}}
<script src="{{ asset('assets\js\vendors\plugins\sweetalert2.init.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js') }}"></script>
@stack('js')

<script>
    $(document).on('click', '.btn-delete', function(e) {
        var form = $("#" + e.target.dataset.id);
        Swal.fire({
            title: 'Hapus Data',
            text: 'Anda yakin akan menghapus data ini ??, data yang telah dihapus tidak dapat dikembalikan',
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: 'success',
            cancelButtonColor: 'primary',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((res) => {
            if (res.isConfirmed) {
                form.submit();
            } else {
                return false;
            }
        });
        return false;
    })
</script>
@if (session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    </script>
@endif
@if (session('error'))
    <script>
        Swal.fire({
            title: 'Gagal',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'Ok'
        })
    </script>
@endif
@if (session('warning'))
    <script>
        Swal.fire({
            title: 'Peringatan',
            text: '{{ session('warning') }}',
            icon: 'warning',
            confirmButtonText: 'Ok'
        })
    </script>
@endif
@if (session('info'))
    <script>
        Swal.fire({
            title: 'Informasi',
            text: '{{ session('info') }}',
            icon: 'info',
            confirmButtonText: 'Ok'
        })
    </script>
@endif

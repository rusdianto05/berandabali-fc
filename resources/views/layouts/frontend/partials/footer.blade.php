<footer>
    <div class="container">
        <div class="text-center">
            <img src="{{ asset('/assets/frontend/images/logo.svg') }}" width="50" alt="" />
            <div class="d-flex gap-4 my-3 flex-wrap my-4 justify-content-center">
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ url('profile-klub') }}">Profil Klub</a>
                <a href="{{ url('team') }}">Tim</a>
                <a href="{{ url('match') }}">Pertandingan</a>
                <a href="{{ url('galery') }}">Galeri</a>
                <a href="{{ url('merchandise') }}">Merchandise</a>
            </div>
            <hr class="hr_footer" />
            <small>&copy; {{ date('Y') }} Beranda Bali FC. All rights reserved.</small>
        </div>
    </div>
</footer>

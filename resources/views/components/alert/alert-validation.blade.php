@if ($errors->any())
    <div class="alert alert-danger alert-dismissible show fade">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ str_replace(['The', 'field is required', 'has already been taken', 'Form'], ['Form', 'harus diisi', 'sudah digunakan', 'Data'], $error) }}
                </li>
                {{-- add more change str replace --}}
            @endforeach
        </ul>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
    </div>
@endif

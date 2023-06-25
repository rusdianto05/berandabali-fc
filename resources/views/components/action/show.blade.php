@if ($status == 'PENDING')
    <a class="btn btn-sm btn-primary shadow mb-2" href="{{ $url_payment }}" target="_blank">
        <i style="font-size: 13px;" class="fa fa-info-circle me-1"></i>
        {{ $label ?? 'Bayar' }}
    </a>
@else
    <a class="btn btn-sm btn-primary shadow mb-2" href="{{ $action }}">
        <i style="font-size: 13px;" class="fa fa-info-circle me-1"></i>
        {{ $label ?? 'Detail' }}
    </a>
@endif

@foreach($stuntings as $stunting)
    <p>{{ $stunting->warga->name }} - {{ $stunting->status_stunting }}</p>
@endforeach

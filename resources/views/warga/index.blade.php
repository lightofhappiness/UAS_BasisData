<!-- resources/views/warga/index.blade.php -->
@foreach($wargas as $warga)
    <div>
        <a href="{{ route('warga.show', $warga->id) }}">{{ $warga->name }}</a>
    </div>
@endforeach

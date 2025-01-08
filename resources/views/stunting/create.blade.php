<!DOCTYPE html>
<html lang="en">
<form method="POST" action="{{ route('stunting.store') }}">
    @csrf
    <label for="warga_id">Warga:</label>
    <select name="warga_id" required>
        @foreach($wargas as $warga)
            <option value="{{ $warga->id }}">{{ $warga->name }}</option>
        @endforeach
    </select>

    <label for="tinggi_badan">Tinggi Badan (cm):</label>
    <input type="text" name="tinggi_badan" required>

    <label for="berat_badan">Berat Badan (kg):</label>
    <input type="text" name="berat_badan" required>

    <label for="usia">Usia (bulan):</label>
    <input type="text" name="usia" required>

    <button type="submit">Simpan</button>
</form>
</html>
<!-- resources/views/warga/create.blade.php -->
<form action="{{ route('warga.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required>
    
    <button type="submit">Save</button>
</form>

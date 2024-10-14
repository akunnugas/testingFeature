<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Wisata</title>
</head>

<body>
    <h1>Edit Wisata</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('wisata.update', $wisata->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ $wisata->nama }}" required>

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskripsi" required>{{ $wisata->deskripsi }}</textarea>

        <label for="kategoris">Kategori:</label>
        <select name="kategoris[]" id="kategoris" multiple required>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ in_array($kategori->id, $selectedKategoris) ? 'selected' : '' }}>
                    {{ $kategori->nama }}</option>
            @endforeach
        </select>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('wisata.index') }}">Kembali</a>
</body>

</html>
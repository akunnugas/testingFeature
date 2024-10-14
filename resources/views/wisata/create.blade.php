<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Wisata</title>
</head>

<body>
    <h1>Tambah Wisata</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('wisata.store') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskripsi" required></textarea>

        <label for="kategoris">Kategori:</label>
        <select name="kategoris[]" id="kategoris" multiple required>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('wisata.index') }}">Kembali</a>
</body>

</html>
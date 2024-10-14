<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Wisata</title>
</head>
<body>
    <h1>Daftar Wisata</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('wisata.create') }}">Tambah Wisata</a>

    <ul>
        @foreach($wisatas as $wisata)
            <li>
                <h2>{{ $wisata->nama }}</h2>
                <p>{{ $wisata->deskripsi }}</p>
                <strong>Kategori:</strong>
                <ul>
                    @foreach($wisata->kategoris as $kategori)
                        <li>{{ $kategori->nama }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('wisata.edit', $wisata->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
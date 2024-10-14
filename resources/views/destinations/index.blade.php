@extends('layouts.destination')

@section('content')
<div class="container">
    <h1>Daftar Destinasi</h1>
    <a href="{{ route('destinations.create') }}" class="btn btn-success mb-3">Tambah Destinasi</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Destinasi</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($destinations as $destination)
                <tr>
                    <td>{{ $destination->id }}</td>
                    <td>{{ $destination->name }}</td>
                    <td>{{ Str::limit($destination->description, 50) }}</td>
                    <td>
                        <div class="d-flex flex-wrap">
                            @foreach($destination->images as $image)
                                <div class="m-1">
                                    <img src="{{ asset('storage/' . $image->path) }}" alt="Image" class="img-thumbnail"
                                        style="width: 100px; height: auto;">
                                </div>
                            @endforeach
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('destinations.edit', $destination->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
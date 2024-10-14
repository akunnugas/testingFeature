@extends('layouts.destination')

@section('content')
<div class="container">
    <h1>Tambah Destinasi</h1>
    <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Destinasi</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Upload Gambar</label>
            <input type="file" class="form-control" name="images[]" multiple required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

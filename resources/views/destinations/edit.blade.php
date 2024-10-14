@extends('layouts.destination')

@section('content')
<div class="container">
    <h1>Edit Destinasi</h1>
    <form action="{{ route('destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $destination->name) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description" required>{{ old('description', $destination->description) }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="images" class="form-label">Upload Gambar Baru (Opsional)</label>
            <input type="file" class="form-control" name="images[]" multiple>
        </div>

        <div class="mb-3">
            <label for="existing-images" class="form-label">Gambar yang Ada</label>
            <div class="d-flex flex-wrap">
                @foreach($destination->images as $image)
                    <div class="m-1">
                        <img src="{{ asset('storage/' . $image->path) }}" alt="Image" class="img-thumbnail" style="width: 100px;">
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

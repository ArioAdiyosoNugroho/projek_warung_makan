<!-- filepath: d:\laragon\www\Warung-Makan-Putri-Jaya\resources\views\setting\editwhyus.blade.php -->
<x-header>Edit Why Us</x-header>
<x-sidebar></x-sidebar>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Edit Why Us</h4>

        <form action="{{ route('setWhyUs.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $item->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $item->description }}</textarea>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('setWhyUs') }}" class="btn btn-secondary">
                    Kembali
                </a>
                
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>            
        </form>
    </div>
</div>

<x-footer></x-footer>
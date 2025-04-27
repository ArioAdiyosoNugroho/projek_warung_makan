<x-header>Detail Menu Spesial</x-header>
<x-sidebar></x-sidebar>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg">
                <div class="card-img-container text-center p-3">
                    <img src="{{ $special->menu->image ? asset('storage/'.$special->menu->image) : asset('images/default-image.jpg') }}" 
                         class="img-fluid rounded" 
                         alt="{{ $special->menu->name }}" 
                         style="max-height: 400px; object-fit: cover;">
                </div>
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">{{ $special->menu->name }}</h2>
                    <h5 class="card-subtitle mb-3 text-muted text-center">Special Menu</h5>
                    <p class="card-text text-justify">{!! nl2br(e($special->description)) !!}</p>
                    <div class="text-center mt-4">
                        <a href="{{ route('specials.index') }}" class="btn btn-secondary">Back to Specials</a>
                        <a href="{{ route('specials.edit', $special) }}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Delete Confirmation --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Data?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus menu spesial <strong>{{ $special->menu->name }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('specials.destroy', $special) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<x-footer></x-footer>


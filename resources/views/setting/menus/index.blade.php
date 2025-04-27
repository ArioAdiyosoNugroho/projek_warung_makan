<x-header>Menu</x-header>
<x-sidebar></x-sidebar>

<x-notifikasi></x-notifikasi>

<div class="container">
    <h2>Daftar Menu</h2>
    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>

    @if ($menus->isEmpty())
        <div class="alert alert-warning text-center" role="alert">
            <strong>Data tidak ada!</strong> Silakan tambahkan menu baru dengan mengklik tombol <strong>Tambah Menu</strong>.
        </div>
    @else
        @foreach ($menus as $menu)
            <div class="card mb-3">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ $menu->image ? asset('storage/'.$menu->image) : asset('images/default-image.jpg') }}" 
                             alt="{{ $menu->name }}" 
                             class="img-thumbnail rounded-circle" 
                             style="width: 100px; height: 100px; object-fit: cover; margin-bottom: 10px;">

                        <h5>{{ $menu->name }} - Rp{{ number_format($menu->price, 0, ',', '.') }}</h5>
                        <p>{{ $menu->description }}</p>
                        <span class="badge bg-info">{{ $menu->category->name }}</span>
                    </div>
                    <div>
                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $menu->id }}" title="Delete">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
            {{-- ====delete modal==== --}}
            <div class="modal fade" id="deleteModal{{ $menu->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Hapus Data?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus data ini?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

<x-footer></x-footer>

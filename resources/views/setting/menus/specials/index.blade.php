<x-header>Menu Spesial</x-header>
<x-sidebar></x-sidebar>

<div class="container my-5">
    <h1 class="text-center mb-4">Spesial</h1>
    <a href="{{ route('specials.create') }}" class="btn btn-primary mb-4">Tambah</a>
    <x-notifikasi></x-notifikasi>

    <div class="row">
        @foreach($specials as $special)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ $special->menu->image ? asset('storage/'.$special->menu->image) : asset('images/default-image.jpg') }}" 
                         class="card-img-top img-fluid" 
                         alt="{{ $special->menu->name }}" 
                         style="max-height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $special->menu->name }}</h5>
                        <p class="card-text">
                            {{ implode(' ', array_slice(explode(' ', $special->description), 0, 10)) }}
                            {{ str_word_count($special->description) > 10 ? '...' : '' }}
                        </p>
                        <div class="mt-auto">
                            <a href="{{ route('specials.show', $special) }}" class="btn btn-primary btn-sm">Read More</a>
                            <a href="{{ route('specials.edit', $special) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $special->id }}">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Delete Confirmation --}}
            <div class="modal fade" id="deleteModal{{ $special->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $special->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{ $special->id }}">Hapus Data?</h5>
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
        @endforeach
    </div>
</div>

<x-footer></x-footer>
<x-header>Read Why Us</x-header>
<x-sidebar></x-sidebar>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Settings/</span> Why Us</h4>

        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Detail Why Us</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="col-form-label">Title</label>
                            <div>
                                <p>{{ $item->title }}</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label">Description</label>
                            <div>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('setWhyUs') }}" class="btn btn-secondary btn-sm me-auto" title="Kembali">
                                    <span>Kembali</span>
                                </a>
                            
                                <div>
                                    <a href="{{ route('setWhyUs.edit', $item->id) }}" class="btn btn-primary btn-sm me-2" title="Edit">
                                        <span>Edit</span>
                                    </a>
                            
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}" title="Delete">
                                        <span>Hapus</span> 
                                    </button>
                                </div>
                            </div>
                            
                            

                            {{-- ====delete modal==== --}}
                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                                            <form action="{{ route('setWhyUs.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer></x-footer>

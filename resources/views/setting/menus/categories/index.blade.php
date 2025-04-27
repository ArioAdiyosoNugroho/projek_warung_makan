<x-header>Kategori</x-header>

<x-sidebar></x-sidebar>

<div class="content-wrapper">
    <!-- Content -->
    
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Setting /</span> Data kategori</h4>
        <x-notifikasi></x-notifikasi>
    
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Data Kategori</h5>
              <!-- Tombol Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                Tambah Data
              </button>
            </div>
    
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @if ($categories->isEmpty())
                    <tr>
                        <td colspan="2" class="text-center">Tidak ada data kategori.</td>
                    </tr>
                @else
                @foreach ($categories as $key => $item)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $key + 1 }} </strong></td>
                    <td>
                        <a href="{{ route('categories.show', $item->id) }}" style="text-decoration: none; color: inherit;">
                            {{ $item->name }}
                        </a>
                    </td>
                    <td>
                        {{-- ====edit===== --}}
                        <button class="btn btn-icon btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}" title="Edit">
                            <span class="tf-icons bx bx-edit"></span>
                        </button>
    
                        {{-- ====delete===== --}}
                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}" title="Delete">
                          <span class="tf-icons bx bx-trash"></span> 
                        </button>
                        
                        {{-- ====edit modal==== --}}
                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('categories.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Kategori</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="name{{ $item->id }}" class="form-label">Nama Kategori</label>
                                                <input type="text" name="name" id="name{{ $item->id }}" class="form-control" value="{{ $item->name }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
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
                                      <form action="{{ route('categories.destroy', $item->id) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger">Hapus</button>
                                      </form>
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    
        <hr class="my-5" />
    
      </div>
      <!-- / Content -->
    
          {{-- =====modal form==== --}}
        <!-- Vertically Centered Modal -->
    <div class="col-lg-4 col-md-6">
          <!-- Modal -->
          <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Nama Kategori</label>
                                <input type="name" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
      </div>
      {{-- =======end modal form===== --}}

<x-footer></x-footer>
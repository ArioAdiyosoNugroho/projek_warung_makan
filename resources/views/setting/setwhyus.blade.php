<x-header>setting</x-header>
<style>
  .container{
    width: 100%;
  }

  @media (max-width: 768px) {
   .isi, .container {
    width: 100%;
    padding: 0; 
    margin: 0 auto;
  }


  .isi, .container {
    width: 100%;
    padding: 0; 
    margin: 0 auto;
  }
}
</style>

<x-sidebar></x-sidebar>

<div class="content-wrapper">
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Setting /</span> Why Us</h4>

    {{-- @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif --}}

    <x-notifikasi></x-notifikasi>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Data Why Us</h5>
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
              <th>Judul</th>
              <th>Deskripsi</th>              
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($whyus as $key => $item)
            <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $key + 1 }} </strong></td>
                <td>
                    <a href="{{ route('setWhyUs.show', $item->id) }}" style="text-decoration: none; color: inherit;">
                        {{ $item->title }}
                    </a>
                </td>
                <td>{{ implode(' ', array_slice(explode(' ', $item->description), 0, 10)) }}{{ str_word_count($item->description) > 10 ? '...' : '' }}</td>
                <td>
                    {{-- ====show===== --}} 
                    <a href="{{ route('setWhyUs.show', $item->id) }}" class="btn btn-icon btn-outline-info btn-sm" title="Read">
                      <span class="tf-icons bx bx-book-open"></span>
                    </a>

                    {{-- ====edit===== --}}
                    <a href="{{ route('setWhyUs.edit', $item->id) }}" class="btn btn-icon btn-outline-primary btn-sm" title="Edit">
                        <span class="tf-icons bx bx-edit"></span>
                    </a>

                    {{-- ====delete===== --}}
                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}" title="Delete">
                      <span class="tf-icons bx bx-trash"></span> 
                    </button>
                    
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
                </td>
            </tr>
            @endforeach
            

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
                <form action="{{ route('setWhyUs.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
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

{{--         
<script>
  var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
      toolbar: [
        [{ 'font': [] }, { 'size': [] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'script': 'sub' }, { 'script': 'super' }],
        [{ 'header': '1' }, { 'header': '2' }, 'blockquote', 'code-block'],
        [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }],
        [{ 'align': [] }],
        ['clean'] // Hapus format
      ]
    }
  });
</script>
<script>
  ClassicEditor
    .create(document.querySelector('#description'), {
        toolbar: [
            'heading', '|', 'bold', 'italic', 'underline', 'strikethrough', '|',
            'bulletedList', 'numberedList', '|', 'alignment', '|',
            'link', 'blockQuote', 'insertTable', 'mediaEmbed', '|', 'undo', 'redo'
        ],
        allowedContent: true, // Mengizinkan semua tag HTML
        table: {
            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
        }
    })
    .then(editor => {
        console.log('Editor was initialized', editor);
        editor.ui.view.editable.element.style.height = '500px';
    })
    .catch(error => {
        console.error('There was a problem initializing the editor.', error);
    });
</script> --}}
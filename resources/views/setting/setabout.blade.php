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
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Settings/</span> About</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">

        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Basic Layout</h5>
              <small class="text-muted float-end">Default label</small>
            </div>
            <div class="card-body">
            
                <div class="container">
                  <div class="isi card-body">
                    <form action="{{ route('setabout.update', $about->id ?? 1) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                          @method('PUT') 
              
                          <div class="mb-3">
                              <label for="image" class="form-label">Upload Foto</label>
                              <input type="file" class="form-control" id="image" name="image" accept="image/*">
                              @if(isset($about->image)) {{-- Tampilkan gambar jika ada --}}
                                  <img src="{{ asset('uploads/' . $about->image) }}" alt="Gambar" class="img-fluid mt-2" width="200">
                              @endif
                          </div>
              
                          <div class="mb-3">
                              <label for="video_url" class="form-label">Upload Link Video</label>
                              <input type="url" class="form-control" id="video_url" name="video_url" placeholder="Masukkan URL video"
                                  value="{{ $about->video_url ?? '' }}" required>
                          </div>
              
                          <div class="mb-3">
                              <label for="description" class="form-label">Deskripsi</label>
                              <textarea id="description" name="description" class="form-control" rows="6">{{ $about->description ?? '' }}</textarea>
                          </div>
              
                          <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                      </form>
                  </div>
                </div> 
        
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->    

<x-footer></x-footer>

        
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
</script>
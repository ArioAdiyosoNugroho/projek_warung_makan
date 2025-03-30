<x-header>setting</x-header>

<x-sidebar></x-sidebar>

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Settings/</span> About</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">

        {{-- PILLS --}}
          <h6 class="text-muted">Basic</h6>
          <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3" role="tablist">
              <li class="nav-item">
                <button
                  type="button"
                  class="nav-link active"
                  role="tab"
                  data-bs-toggle="tab"
                  data-bs-target="#navs-pills-top-home"
                  aria-controls="navs-pills-top-home"
                  aria-selected="true"
                >
                  Home
                </button>
              </li>
              <li class="nav-item">
                <button
                  type="button"
                  class="nav-link"
                  role="tab"
                  data-bs-toggle="tab"
                  data-bs-target="#navs-pills-top-about"
                  aria-controls="navs-pills-top-about"
                  aria-selected="false"
                >
                  About
                </button>
              </li>
              <li class="nav-item">
                <button
                  type="button"
                  class="nav-link"
                  role="tab"
                  data-bs-toggle="tab"
                  data-bs-target="#navs-pills-top-about-profile"
                  aria-controls="navs-pills-top-about-profile"
                  aria-selected="false"
                >
                  about/why us
                </button>
              </li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                <p>
                  Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps
                  powder. Bear claw candy topping.
                </p>
              </div>

              <div class="tab-pane fade" id="navs-pills-top-about" role="tabpanel">
                <p>
                    Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice
                    cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream
                    cheesecake fruitcake.
                </p>
                <div class="container">
                  <div class="card-body">
                    <form action="{{ route('setabout.update', $about->id ?? 1) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                          @method('PUT') {{-- Laravel butuh ini untuk update data --}}
              
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
         
              <div class="tab-pane fade" id="navs-pills-top-about-profile" role="tabpanel">
                <p>
                  Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
                  cupcake gummi bears cake chocolate.
                </p>
              </div>

            </div>
          </div>
        {{-- END PILLS --}}

        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Basic Layout</h5>
              <small class="text-muted float-end">Default label</small>
            </div>
            <div class="card-body">
              <form>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
                  <div class="col-sm-10">
                    <input
                      type="text"
                      class="form-control"
                      id="basic-default-company"
                      placeholder="ACME Inc."
                    />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <input
                        type="text"
                        id="basic-default-email"
                        class="form-control"
                        placeholder="john.doe"
                        aria-label="john.doe"
                        aria-describedby="basic-default-email2"
                      />
                      <span class="input-group-text" id="basic-default-email2">@example.com</span>
                    </div>
                    <div class="form-text">You can use letters, numbers & periods</div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
                  <div class="col-sm-10">
                    <input
                      type="text"
                      id="basic-default-phone"
                      class="form-control phone-mask"
                      placeholder="658 799 8941"
                      aria-label="658 799 8941"
                      aria-describedby="basic-default-phone"
                    />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                  <div class="col-sm-10">
                    <textarea
                      id="basic-default-message"
                      class="form-control"
                      placeholder="Hi, Do you have a moment to talk Joe?"
                      aria-label="Hi, Do you have a moment to talk Joe?"
                      aria-describedby="basic-icon-default-message2"
                    ></textarea>
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Send</button>
                  </div>
                </div>
              </form>
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
<x-header>Tambah Menu Spesial</x-header>
<x-sidebar></x-sidebar>

<div class="container">
    <h1>Add Special</h1>
    <form action="{{ route('specials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="menu_id" class="form-label">Menu</label>
            <select name="menu_id" id="menu_id" class="form-control" required onchange="updateMenuDetails()">
                <option value="">-- Select Menu --</option>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}" data-name="{{ $menu->name }}" data-image="{{ $menu->image ? asset('storage/'.$menu->image) : asset('images/default-image.jpg') }}">
                        {{ $menu->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @if ($errors->has('menu_id'))
    <div class="text-danger">
        {{ $errors->first('menu_id') }}
    </div>
@endif
        <div class="mb-3">
            <label class="form-label">Selected Menu Name</label>
            <input type="text" id="menu_name" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Selected Menu Image</label>
            <img id="menu_image" src="{{ asset('images/default-image.jpg') }}" alt="Menu Image" class="img-fluid" style="max-width: 200px;">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<x-footer></x-footer>

<script>
    function updateMenuDetails() {
        const menuSelect = document.getElementById('menu_id');
        const selectedOption = menuSelect.options[menuSelect.selectedIndex];
        const menuName = selectedOption.getAttribute('data-name');
        const menuImage = selectedOption.getAttribute('data-image');

        document.getElementById('menu_name').value = menuName || '';
        document.getElementById('menu_image').src = menuImage || '{{ asset('images/default-image.jpg') }}';
    }
</script>

{{-- <script>
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
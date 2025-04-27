<x-header>Edit Menu Spesial</x-header>
<x-sidebar></x-sidebar>
<div class="container">
    <h1>Edit Special</h1>
    <form action="{{ route('specials.update', $special) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="menu_id" class="form-label">Menu</label>
            <select name="menu_id" id="menu_id" class="form-control" required onchange="updateMenuDetails()">
                <option value="">-- Select Menu --</option>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}" 
                            data-name="{{ $menu->name }}" 
                            data-image="{{ $menu->image ? asset('storage/'.$menu->image) : asset('images/default-image.jpg') }}"
                            {{ $special->menu_id == $menu->id ? 'selected' : '' }}>
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
            <input type="text" id="menu_name" class="form-control" value="{{ $special->menu->name }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Selected Menu Image</label>
            <img id="menu_image" src="{{ $special->menu->image ? asset('storage/'.$special->menu->image) : asset('images/default-image.jpg') }}" alt="Menu Image" class="img-fluid" style="max-width: 200px;">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ $special->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

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

<x-footer></x-footer>
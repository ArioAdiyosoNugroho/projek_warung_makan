<x-header>Create</x-header>
<x-sidebar></x-sidebar>
<div class="container">
    <h2>{{ isset($menu) ? 'Edit' : 'Tambah' }} Menu</h2>

    <form action="{{ isset($menu) ? route('menus.update', $menu->id) : route('menus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($menu)) @method('PUT') @endif

        <div class="mb-3">
            <label for="name">Nama Menu</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $menu->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control" placeholder="Opsional" >{{ old('description', $menu->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price">Harga</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $menu->price ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">-- Select Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image">Gambar (opsional)</label>
            <input type="file" name="image" class="form-control">
            @if(isset($menu) && $menu->image)
                <img src="{{ asset('storage/'.$menu->image) }}" width="100" class="mt-2">
            @endif
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('menus.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<x-footer></x-footer>
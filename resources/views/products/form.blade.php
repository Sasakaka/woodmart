<div class="mb-3">
    <label for="category_id" class="form-label">
        Kategori
    </label>

    <select name="category_id" id="category_id" class="form-select" required>
        <option value="">-- Pilih Kategori --</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->category_name }}
            </option>
        @endforeach
    </select>

    @error('category_id')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="mb-3">
    <label for="product_name" class="form-label">
        Nama Produk
    </label>

    <input
        type="text"
        name="product_name"
        id="product_name"
        class="form-control"
        value="{{ old('product_name', $product->product_name ?? '') }}"
        required
    >

    @error('product_name')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="mb-3">
    <label for="description" class="form-label">
        Deskripsi
    </label>

    <textarea
        name="description"
        id="description"
        class="form-control"
        rows="4"
    >{{ old('description', $product->description ?? '') }}</textarea>

    @error('description')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="mb-3">
    <label for="stock" class="form-label">
        Stok
    </label>

    <input
        type="number"
        name="stock"
        id="stock"
        class="form-control"
        value="{{ old('stock', $product->stock ?? 0) }}"
        min="0"
        required
    >

    @error('stock')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="mb-3">
    <label for="price" class="form-label">
        Harga
    </label>

    <input
        type="number"
        name="price"
        id="price"
        class="form-control"
        value="{{ old('price', $product->price ?? '') }}"
        min="0"
        step="0.01"
        required
    >

    @error('price')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="mb-3">
    <label for="image" class="form-label">
        Gambar Produk
    </label>
    <input
        type="file"
        name="image"
        id="image"
        class="form-control"
        accept=".jpg,.jpeg,.png,.webp"
    >

    @error('image')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label">
        Status
    </label>

    <div class="form-check">
        <input
            type="checkbox"
            name="status"
            id="status"
            value="1"
            class="form-check-input"
            {{ old('status', $product->status ?? true) ? 'checked' : '' }}
        >

        <label for="status" class="form-check-label">
            Produk Aktif
        </label>
    </div>
</div>
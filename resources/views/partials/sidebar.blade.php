<div class="bg-dark text-white vh-100 p-3 shadow" style="width:260px; min-width:260px; position:fixed; height:100vh;">
    <h2 class="text-center fw-bold mb-4">
        🌲 WoodMart
    </h2>
    <hr>
    <a href="#" class="btn btn-success w-100 text-start mb-2">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>
    <a href="{{ route('categories.index') }}" class="btn {{ request()->routeIs('categories.*') ? 'btn-success' : 'btn-outline-light' }} w-100 text-start mb-2">
        <i class="bi bi-folder"></i> Kategori
    </a>
    <a href="{{ route('products.index') }}" class="btn {{ request()->routeIs('products.*') ? 'btn-success' : 'btn-outline-light' }} w-100 text-start mb-2">
        <i class="bi bi-box-seam"></i> Produk
    </a>
    <a href="#" class="btn btn-outline-light w-100 text-start mb-2">
        <i class="bi bi-truck"></i> Supplier
    </a>
    <a href="#" class="btn btn-outline-light w-100 text-start mb-2">
        <i class="bi bi-file-earmark-bar-graph"></i> Laporan
    </a>
</div>
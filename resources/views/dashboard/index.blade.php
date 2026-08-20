@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Dashboard WoodMart</h2>
        <p class="text-muted mb-0">
            Ringkasan informasi penting terkait produk dan stok WoodMart.
        </p>
    </div>
</div>

<div class="row g-4">
    {{-- Total Produk --}}
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Produk</p>
                        <h3 class="fw-bold mb-0">
                            {{ $totalProducts }}
                        </h3>
                    </div>
                    <div class="fs-1 text-primary">
                        <i class="bi bi-box-seam"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Total Kategori --}}
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Kategori</p>
                        <h3 class="fw-bold mb-0">
                            {{ $totalCategories }}
                        </h3>
                    </div>
                    <div class="fs-1 text-success">
                        <i class="bi bi-tags"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Total Stok --}}
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Total Stok</p>
                        <h3 class="fw-bold mb-0">
                            {{ number_format($totalStock, 0, ',', '.') }}
                        </h3>
                    </div>
                    <div class="fs-1 text-warning">
                        <i class="bi bi-stack"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Stok Menipis --}}
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1">Stok Menipis</p>
                        <h3 class="fw-bold mb-0">
                            {{ $lowStockProducts }}
                        </h3>
                    </div>
                    <div class="fs-1 text-danger">
                        <i class="bi bi-exclamation-triangle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Status Produk --}}
<div class="card shadow-sm border-0 mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-1">
                    Status Produk
                </h5>
                <p class="text-muted mb-0">
                    Ringkasan produk aktif dan nonaktif.
                </p>
            </div>
            <i class="bi bi-activity fs-3 text-success"></i>
        </div>
        <div class="row g-3">
            {{-- Produk Aktif --}}
            <div class="col-md-6">
                <div class="border rounded p-3 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">
                                Produk Aktif
                            </p>
                            <h3 class="fw-bold text-succes mb-0">
                                {{ $activeProduct }}
                            </h3>
                        </div>
                        <div class="fs-1 text-success">
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Produk Nonaktif --}}
            <div class="col-md-6">
                <div class="border rounded p-3 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">
                                Produk Nonaktif
                            </p>
                            <h3 class="fw-bold text-danger mb-0">
                                {{ $inactiveProduct }}
                            </h3>
                        </div>
                        <div class="fs-1 text-danger">
                            <i class="bi bi-x-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Nilai Persedian --}}
<div class="card shadow-sm border-0 mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <p class="text-muted mb-1">
                    Nilai Persediaan Stok
                </p>
                <h3 class="fw-bold mb-1">
                    Rp {{ number_format($totalInventoryValue, 0, ',', '.') }}
                </h3>
                <p class="text-muted mb-0">
                    Estimasi total nilai seluruh stok produk saat ini.
                </p>
            </div>
            <div class="fs-1 text-success">
                <i class="bi bi-cash-stack"></i>
            </div>
        </div>
    </div>
</div>

{{-- Produk dengan Stok Menipis --}}
<div class="card shadow-sm border-0 mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-1">Produk dengan Stok Menipis</h5>
                <p class="text-muted mb-0">
                    Produk dengan stok 5 atau kurang.
                </p>
            </div>

            <i class="bi bi-exclamation-triangle fs-3 text-danger"></i>
        </div>

        @if($lowStockProductsList->count() > 0)

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lowStockProductsList as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <strong>{{ $product->product_name }}</strong>
                                </td>

                                <td>
                                    {{ $product->category->category_name ?? '-' }}
                                </td>

                                <td>
                                    <span class="badge bg-danger">
                                        {{ $product->stock }}
                                    </span>
                                </td>

                                <td>
                                    <span class="text-danger">
                                        <i class="bi bi-exclamation-circle"></i>
                                        Stok Menipis
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else

            <div class="alert alert-success mb-0">
                <i class="bi bi-check-circle me-2"></i>
                Tidak ada produk dengan stok menipis.
            </div>
            

        @endif
    </div>
</div>
    
{{-- Grafik Produk Per Kategori --}}
<div class="row g-4 mt-4">
    {{-- Grafik --}}
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="fw-bold mb-1">
                            Produk per Kategori
                        </h5>
                        <p class="text-muted mb-0">
                            Jumlah produk berdasarkan kategori.
                        </p>
                    </div>
                    <i class="bi bi-bar-chart fs-3 text-primary"></i>
                </div>
                <div style="height: 300px;">
                    <canvas id="productsByCategoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    {{-- Ringkasan Kategori --}}
    <div class="col-lg-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h5 class="fw-bold mb-4">
                    Ringkasan Kategori
                </h5>
                @foreach($productsByCategory as $category)
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-semibold">
                            {{ $category->category_name }}
                        </span>
                        <span class="badge bg-primary">
                            {{ $category->products_count }} produk
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- Produk Terbaru --}}
<div class="card shadow-sm border-0 mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-1">
                    Produk Terbaru
                </h5>
                <p class="text-muted mb-0">
                    Lima produk yang terakhir ditambahkan.
                </p>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-sm">
                Lihat Semua Produk

                <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
        @if($latestProducts->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-midle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestProducts as $product)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <span class="fw-semibold">
                                        {{ $product->product_name }}
                                    </span>
                                </td>
                                <td>
                                    {{ $product->category->category_name ?? '-' }}
                                </td>
                                <td>
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>
                                <td>
                                    {{ $product->stock }}
                                </td>
                                <td>
                                    @if($product->status)
                                        <span class="badge bg-success">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info mb-0">
                <i class="bi bi-info-circle me-1"></i>
                Belum ada produk
            </div>
        @endif
    </div>
</div>

{{-- Produk dengan Stok Terbanyak --}}
<div class="card shadow-sm border-0 mt-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-1">
                    Produk dengan Stok Terbanyak
                </h5>
                <p class="text-muted mb-0">
                    Lima produk dengan jumlah stok tertinggi saat ini.
                </p>
            </div>
            <i class="bi bi-boxes fs-3 text-primary"></i>
        </div>
        @if($highestStockProducts->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($highestStockProducts as $product)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <span class="fw-semibold">
                                        {{ $product->product_name }}
                                    </span>
                                </td>
                                <td>
                                    {{ $product->category->category_name ?? '-' }}
                                </td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ $product->stock }}
                                    </span>
                                </td>
                                <td>
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info mb-0">
                <i class="bi bi-info-circle me-1"></i>
                Belum ada data produk.
            </div>
        @endif
    </div>
</div>
@endsection

{{-- Chart.js --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const categoryLabels = @json($categoryLabels);
    const categoryData = @json($categoryData);
    
    const ctx = document.getElementById('productsByCategoryChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Jumlah Produk',
                data: categoryData,
                borderWidth: 1,
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endpush
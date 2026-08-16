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
    <div class="row g-4 mt-1">
        {{-- Grafik --}}
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-1">
                            Produk per Kategori
                        </h5>
                        <p class="text-muted mb-0">
                            Jumlah Produk berdasarkan kategori.
                        </p>
                    </div>
                    <i class= "bi bi-exclamation-triangle fs-3 text-danger"></i>
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
                <h5 class="fw-bold mb-5">Ringkasan Kategori</h5>
                @foreach($productsByCategory as $category => $total)
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-semibold">{{ $category }}</span>
                        <span class="badge bg-primary">{{ $total }} produk</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Chart.js --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const categoryLabels = @json($productsByCategory->keys()->values());
    const categoryData = @json($productsByCategory->values());
    const ctx = document.getElementById('productCategoryChart');

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
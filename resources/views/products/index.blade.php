@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')

<div class="card shadow-sm">

    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Daftar Produk</h2>

        <a href="{{ route('products.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah Produk
        </a>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th width="180">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($products as $product)

                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td width="90">
                            @if($product->image)
                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->product_name }}"
                                    width="70"
                                    height="70"
                                    class="rounded"
                                    style="object-fit: cover;"
                                >
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>

                        <td>{{ $product->product_name }}</td>

                        <td>{{ $product->category->category_name }}</td>

                        <td>
                            Rp {{ number_format($product->price,0,',','.') }}
                        </td>

                        <td>{{ $product->stock }}</td>

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

                        <td>

                            <a href="#" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                                Edit
                            </a>
                            
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            Belum ada produk.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Yakin ingin menghapus produk ini?',
                text: 'Data produk yang dihapus tidak dapat dikembalikan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

@endpush
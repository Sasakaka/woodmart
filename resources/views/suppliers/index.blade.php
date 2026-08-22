@extends('layouts.app')
@section('title', 'Supplier')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">
            Supplier
        </h2>

        <p class="text-muted mb-0">
            Kelola data supplier WoodMart
        </p>
    </div>
    <a href="{{ route('suppliers.create') }}" class="btn btn-success">
    <i class="bi bi-plus-circle me-1"></i>
    Tambah Supplier
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($suppliers as $supplier)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                <span class="fw-semibold">
                                    {{ $supplier->supplier_name }}
                                </span>
                            </td>
                            <td>
                                {{ $supplier->phone ?? '-' }}
                            </td>
                            <td>
                                {{ $supplier->email ?? '-' }}
                            </td>
                            <td>
                                {{ $supplier->address ?? '-' }}
                            </td>
                            <td>
                                @if($supplier->status)
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
                                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                </a>
                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline delete-supplier-form" data-name="{{ $supplier->supplier_name }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm delete-supplier-btn">
                                        <i class="bi bi-trash"></i>
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                Belum ada data supplier
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
    document.querySelectorAll('.delete-supplier-btn').forEach(function (button){
        button.addEventListener('click', function(){
            const form = button.closest('.delete-supplier-form');
            const supplierName = form.dataset.name;

            Swal.fire({
                title: 'Hapus Supplier ?',
                text: 'Supplier "'+ supplierName +'" akan dihapus.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#dc3545',
            }).then(function (result){
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
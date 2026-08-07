@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                Daftar Kategori
            </h4>
            <a href="{{ route('categories.create') }}" class="btn btn-success">
                <i class="bi bi-plus-lg"></i> Tambah Kategori
            </a>
        </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th width="80">ID</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th width="100">Status</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->description }}</td>
                        <td class="text-center">
                            @if ($category->status)
                            <span class="badge bg-success text-center"> ● Aktif </span>
                            @else
                            <span class="badge bg-danger text-center"> ● Nonaktif </span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="delete-form d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada kategori yang ditambahkan.</td>
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
    document.querySelectorAll('.delete-form').forEach(form=>{
        form.addEventListener('submit', function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus kategori ini?',
                text: 'Data tidak dapat dikembalikan setelah dihapus.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result)=>{
                if(result.isConfirmed){
                    form.submit();
                }
            });
        });
    });

</script>

@endpush
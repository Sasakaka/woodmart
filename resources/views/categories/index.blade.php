@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')

<h2 class="mb-4">

    Daftar Kategori

</h2>

<a href="{{ route('categories.create') }}" class="btn btn-success mb-3">

    Tambah Kategori
</a>

<table class="table table-bordered table-hover">
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
            <td>{{ $category->id }}</td>
            <td>{{ $category->category_name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                @if ($category->status)
                <span class="badge bg-success">Aktif</span>
                @else
                <span class="badge bg-danger">Nonaktif</span>
                @endif
            </td>
            <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="delete-form d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Belum ada kategori yang ditambahkan.</td>
        </tr>
        @endforelse
    </tbody>
</table>

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
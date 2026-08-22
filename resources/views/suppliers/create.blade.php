@extends('layouts.app')
@section('title', 'Tambah Supplier')
@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1">Tambah Supplier</h2>
    <p class="text-muted mb-0">
        Tambahkan data supplier baru WoodMart
    </p>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf
            {{-- Nama Supplier --}}
            <div class="mb-3">
                <label for="supplier_name" class="form-label">
                    Nama Supplier
                </label>
                <input type="text" name="supplier_name" id="supplier_name" class="form-control" value="{{ old('supplier_name') }}" placeholder="Masukan nama supplier">
            </div> 
            {{-- Nomor Telepon --}}
            <div class="mb-3">
                <label for="phone" class="form-label">
                    Nomor Telepon
                </label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="Contoh: 081234567890">
            </div> 
            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">
                    Email
                </label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Contoh: supplier@gmail.com">
            </div>
            {{-- Alamat --}}
            <div class="mb-3">
                <label for="address" class="form-label">
                    Alamat
                </label>
                <textarea name="address" id="address" class="form-control" rows="4" placeholder="Masukan alamat supplier">{{ old('address') }}</textarea>
            </div> 
            {{-- Status --}}
            <div class="mb-4">
                <label for="status" class="form-label">
                    Status
                </label>
                <select name="status" id="status" class="form-select">
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
            </div>
            {{-- Tombol --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save me-1"></i>
                    Simpan Supplier
                </button>
                <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
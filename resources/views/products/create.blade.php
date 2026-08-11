@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

<div class="card">
    <div class="card-header">
        <h2 class="mb-0">Tambah Produk</h2>
    </div>

    <div class="card-body">

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('products.form')

            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i>
                Simpan Produk
            </button>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                Batal
            </a>
        </form>

    </div>
</div>

@endsection
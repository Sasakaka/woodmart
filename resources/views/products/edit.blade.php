@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

<div class="card shadow-sm">

    <div class="card-header bg-white">
        <h2 class="mb-0">Edit Produk</h2>
    </div>

    <div class="card-body">

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            @include('products.form')

            <div class="mb-3">

                <label class="form-label">
                    Gambar Saat Ini
                </label>

                <br>

                @if($product->image)

                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->product_name }}"
                        width="150"
                        height="150"
                        class="rounded border"
                        style="object-fit: cover;"
                    >

                @else

                    <p class="text-muted">
                        Belum ada gambar.
                    </p>

                @endif

            </div>

            <button type="submit" class="btn btn-warning">
                <i class="bi bi-pencil"></i>
                Update Produk
            </button>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection
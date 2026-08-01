<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-success text-white">
                Tambah Kategori
            </div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="category_name" class="form-label">
                            Nama Kategori
                        </label>
                        <input type="text" name="category_name" id="category_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">
                            Deskripsi
                        </label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>
                    <button class="btn btn-success">
                        Simpan
                    </button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id', 'category_name');

        if ($categories->isEmpty()) {
            $this->command->error('Belum ada kategori. Silakan buat kategori terlebih dahulu.');
            return;
        }

        $products = [
            // =========================
            // KAYU MAHONI
            // =========================
            [
                'category_id' => $categories['Kayu Mahoni'],
                'product_name' => 'Kayu Mahoni 2x4',
                'description' => 'Kayu mahoni ukuran 2x4 untuk furniture dan konstruksi.',
                'stock' => 25,
                'price' => 125000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Kayu Mahoni'],
                'product_name' => 'Kayu Mahoni 4x6',
                'description' => 'Kayu mahoni ukuran 4x6 untuk kebutuhan furniture.',
                'stock' => 15,
                'price' => 225000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Kayu Mahoni'],
                'product_name' => 'Kayu Mahoni 6x8',
                'description' => 'Kayu mahoni ukuran besar untuk konstruksi dan furniture.',
                'stock' => 8,
                'price' => 350000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Kayu Mahoni'],
                'product_name' => 'Papan Mahoni 20cm',
                'description' => 'Papan kayu mahoni untuk pembuatan meja dan furniture.',
                'stock' => 12,
                'price' => 275000,
                'status' => true,
            ],

            // =========================
            // TRIPLEK
            // =========================
            [
                'category_id' => $categories['Triplek'],
                'product_name' => 'Triplek 3mm',
                'description' => 'Triplek ketebalan 3mm untuk kebutuhan interior.',
                'stock' => 40,
                'price' => 65000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Triplek'],
                'product_name' => 'Triplek 6mm',
                'description' => 'Triplek ketebalan 6mm untuk furniture.',
                'stock' => 30,
                'price' => 95000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Triplek'],
                'product_name' => 'Triplek 9mm',
                'description' => 'Triplek ketebalan 9mm untuk konstruksi.',
                'stock' => 20,
                'price' => 135000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Triplek'],
                'product_name' => 'Triplek 12mm',
                'description' => 'Triplek ketebalan 12mm untuk furniture dan konstruksi.',
                'stock' => 10,
                'price' => 175000,
                'status' => true,
            ],

            // =========================
            // CAT BANGUNAN
            // =========================
            [
                'category_id' => $categories['Cat Bangunan'],
                'product_name' => 'Cat Tembok Putih 5kg',
                'description' => 'Cat tembok warna putih untuk interior dan eksterior.',
                'stock' => 18,
                'price' => 145000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Cat Bangunan'],
                'product_name' => 'Cat Tembok Putih 20kg',
                'description' => 'Cat tembok kemasan besar untuk kebutuhan proyek.',
                'stock' => 8,
                'price' => 425000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Cat Bangunan'],
                'product_name' => 'Cat Kayu Coklat 1kg',
                'description' => 'Cat khusus kayu warna coklat.',
                'stock' => 15,
                'price' => 85000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Cat Bangunan'],
                'product_name' => 'Cat Besi Hitam 1kg',
                'description' => 'Cat besi warna hitam untuk perlindungan permukaan besi.',
                'stock' => 12,
                'price' => 90000,
                'status' => true,
            ],

            // =========================
            // PAKU & BAUT
            // =========================
            [
                'category_id' => $categories['Paku & Baut'],
                'product_name' => 'Paku 2 Inch 1kg',
                'description' => 'Paku ukuran 2 inch untuk pekerjaan kayu.',
                'stock' => 50,
                'price' => 28000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Paku & Baut'],
                'product_name' => 'Paku 3 Inch 1kg',
                'description' => 'Paku ukuran 3 inch untuk konstruksi.',
                'stock' => 40,
                'price' => 32000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Paku & Baut'],
                'product_name' => 'Sekrup Kayu 1.5 Inch',
                'description' => 'Sekrup untuk pekerjaan furniture dan kayu.',
                'stock' => 35,
                'price' => 35000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Paku & Baut'],
                'product_name' => 'Baut 10mm 1kg',
                'description' => 'Baut ukuran 10mm untuk kebutuhan konstruksi.',
                'stock' => 20,
                'price' => 55000,
                'status' => true,
            ],

            // =========================
            // PERALATAN TUKANG
            // =========================
            [
                'category_id' => $categories['Peralatan Tukang'],
                'product_name' => 'Palu Besi 500gram',
                'description' => 'Palu besi untuk pekerjaan pertukangan.',
                'stock' => 25,
                'price' => 75000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Peralatan Tukang'],
                'product_name' => 'Palu Besi 1kg',
                'description' => 'Palu besi ukuran 1kg untuk pekerjaan konstruksi.',
                'stock' => 18,
                'price' => 115000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Peralatan Tukang'],
                'product_name' => 'Obeng Plus 6 Inch',
                'description' => 'Obeng kepala plus untuk pemasangan sekrup.',
                'stock' => 35,
                'price' => 25000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Peralatan Tukang'],
                'product_name' => 'Obeng Minus 6 Inch',
                'description' => 'Obeng kepala minus untuk pekerjaan rumah.',
                'stock' => 28,
                'price' => 23000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Peralatan Tukang'],
                'product_name' => 'Tang Kombinasi 8 Inch',
                'description' => 'Tang kombinasi untuk berbagai pekerjaan pertukangan.',
                'stock' => 20,
                'price' => 65000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Peralatan Tukang'],
                'product_name' => 'Gergaji Kayu 20 Inch',
                'description' => 'Gergaji tangan untuk memotong berbagai jenis kayu.',
                'stock' => 7,
                'price' => 95000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Peralatan Tukang'],
                'product_name' => 'Bor Tangan 10mm',
                'description' => 'Bor tangan untuk pekerjaan pengeboran kayu dan besi.',
                'stock' => 5,
                'price' => 425000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Peralatan Tukang'],
                'product_name' => 'Meteran 5 Meter',
                'description' => 'Meteran 5 meter untuk pengukuran material.',
                'stock' => 30,
                'price' => 35000,
                'status' => true,
            ],

            // =========================
            // FURNITURE
            // =========================
            [
                'category_id' => $categories['Furniture'],
                'product_name' => 'Meja Kayu Minimalis',
                'description' => 'Meja kayu minimalis untuk ruang kerja dan rumah.',
                'stock' => 6,
                'price' => 850000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Furniture'],
                'product_name' => 'Kursi Kayu Jati',
                'description' => 'Kursi kayu untuk ruang makan dan ruang tamu.',
                'stock' => 10,
                'price' => 650000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Furniture'],
                'product_name' => 'Rak Kayu 3 Tingkat',
                'description' => 'Rak kayu tiga tingkat untuk penyimpanan barang.',
                'stock' => 4,
                'price' => 475000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Furniture'],
                'product_name' => 'Lemari Kayu 2 Pintu',
                'description' => 'Lemari kayu dua pintu untuk kebutuhan rumah.',
                'stock' => 2,
                'price' => 1850000,
                'status' => true,
            ],
            [
                'category_id' => $categories['Furniture'],
                'product_name' => 'Bangku Kayu',
                'description' => 'Bangku kayu sederhana untuk rumah dan toko.',
                'stock' => 3,
                'price' => 275000,
                'status' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
        $this->command->info(count($products) .' produk berhasil ditambahkan.');
    }
}

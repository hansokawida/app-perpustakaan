# App Perpustakaan

## Deskripsi

**App Perpustakaan** adalah aplikasi **Sistem Perpustakaan Digital Kampus** yang digunakan untuk membantu petugas atau admin dalam mengelola data buku, anggota, dan transaksi peminjaman secara terstruktur.

## Tujuan

Aplikasi ini bertujuan untuk menyediakan kerangka sistem yang dapat dikembangkan untuk mengelola kegiatan perpustakaan kampus menggunakan **Laravel 12** dengan arsitektur **MVC (Model, View, Controller)**.

## Cara Menjalankan Project Secara Lokal

Pastikan **PHP** dan **Composer** sudah terinstall pada komputer.

1. Clone repository:

   ```bash
   git clone https://github.com/[USERNAME]/app-perpustakaan.git
   ```

2. Masuk ke folder project:

   ```bash
   cd app-perpustakaan
   ```

3. Install dependency:

   ```bash
   composer install
   ```

4. Jalankan development server:

   ```bash
   php artisan serve
   ```

5. Buka aplikasi melalui browser:

   ```text
   http://127.0.0.1:8000
   ```

## Teknologi

* PHP
* Laravel 12
* Composer
* MySQL

Menurut pemahaman saya, 
* **Model** bertugas mengelola data dan berhubungan dengan database
* **View** bertugas menampilkan data kepada pengguna
* **Controller** menjadi penghubung yang mengatur proses antara Model dan View. Dengan pembagian ini, setiap bagian memiliki tugas yang jelas sehingga aplikasi lebih mudah dikembangkan dan dipelihara.

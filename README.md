### Project

**Case Study: Online Shop**

**Project Summary**

Tujuan dari proyek ini adalah mengembangkan toko online yang user friendly yang memungkinkan user untuk explore produk, register, login, menambahkan barang ke keranjang, dan melanjutkan ke proses checkout dengan sistem pembayaran.

**Features Requirement**

**1\. Register User**

- **Fitur**: Memungkinkan pengguna untuk membuat akun.
- **Persyaratan**:
  - Formulir pendaftaran dengan kolom untuk:
    - Nama
    - Email (harus unik)
    - Kata sandi (dengan validasi password strenght)
    - Konfirmasi kata sandi
  - Validasi input dan pesan kesalahan.
  - Verifikasi email setelah pendaftaran.
  - Pendaftaran yang berhasil mengarahkan ke halaman login.

**2\. Login User**

- **Fitur**: Memungkinkan pengguna untuk masuk ke akun mereka.
- **Persyaratan**:
  - Formulir login dengan kolom untuk:
    - Email
    - Kata sandi
  - Opsi "ingat saya" untuk login permanen.
  - Validasi input dan pesan kesalahan.
  - Login yang berhasil mengarahkan ke halaman daftar produk.
  - Opsi untuk reset kata sandi melalui email.

**3\. Daftar Produk**

- **Fitur**: Menampilkan daftar produk yang tersedia untuk dibeli.
- **Persyaratan**:
  - Setiap produk harus menampilkan:
    - Gambar produk
    - Nama
    - Harga
    - Deskripsi singkat
    - Tombol tambahkan ke keranjang
  - Pagination untuk navigasi yang lebih baik melalui produk.
  - Fungsi pencarian untuk menemukan produk berdasarkan nama atau kategori.
  - Filter kategori untuk mempersempit pilihan.

**4\. Keranjang Belanja**

- **Fitur**: Memungkinkan pengguna untuk mengelola keranjang produk mereka.
- **Persyaratan**:
  - Menampilkan isi keranjang dengan:
    - Gambar produk
    - Nama
    - Jumlah (dengan opsi untuk memperbarui)
    - Harga
    - Total harga untuk setiap item
  - Opsi untuk menghapus item dari keranjang.
  - Menampilkan total harga dari semua item di keranjang.
  - Opsi untuk melanjutkan ke checkout.

**5\. Proses Checkout**

- **Fitur**: Menangani proses checkout.
- **Persyaratan**:
  - Formulir checkout dengan kolom untuk:
    - Alamat pengiriman (nama, alamat jalan, kota, negara bagian, kode pos)
    - Alamat penagihan (opsi untuk menggunakan alamat pengiriman)
    - Pemilihan metode pembayaran (kartu kredit, PayPal, dll.)
  - Validasi kolom input.
  - Ringkasan item yang akan dibeli.
  - Opsi untuk meninjau dan mengonfirmasi pesanan sebelum pembayaran.

**6\. Integrasi Pembayaran**

- **Fitur**: Memproses pembayaran dengan aman.
- **Persyaratan**:
  - Mengintegrasikan gateway pembayaran (misalnya midtrans).
  - Menangani transaksi yang berhasil dan gagal.
  - Mengirim email konfirmasi kepada pengguna setelah pembelian berhasil.
  - Menyimpan detail transaksi dalam database untuk pencatatan.

**Technical Requirement**

- **Framework**: Laravel 11
- **Database**: MySQL atau PostgreSQL
- **Frontend**: Blade Engine untuk tampilan, Bootstrap untuk styling
- **Otentikasi**: Gunakan sistem Auth Laravel.
- **Gateway Pembayaran**: Midtrans dll.


### Pertemuan Ke 1
- Pembuatan Project
- Koneksi ke database (PostgreSQL/MySQL)

### Pertemuan Ke 2
- Pembuatan Migration
  
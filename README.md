# Fulki Hasya - Solusi Alat Kesehatan Terpercaya

Fulki Hasya adalah platform web profesional untuk katalog dan manajemen alat kesehatan. Website ini dirancang untuk memberikan pengalaman browsing produk medis yang elegan, cepat, dan responsif, sekaligus menyediakan sistem administrasi yang lengkap untuk pengelolaan data bisnis.

## 🚀 Fitur Utama

### Frontend (User Interface)
- **Katalog Produk Dinamis**: Pencarian dan filter produk berdasarkan kategori tanpa reload (AJAX).
- **Pagination Canggih**: Navigasi halaman produk yang cepat dengan sistem asinkron.
- **Detail Produk Lengkap**: Galeri foto produk, spesifikasi teknis, dan fitur produk terkait.
- **Responsive Design**: Tampilan yang optimal di berbagai perangkat (Mobile, Tablet, Desktop).
- **Optimasi SEO**: Penggunaan metadata dinamis, struktur heading yang tepat, dan skema JSON-LD.
- **Integrasi WhatsApp**: Tombol konsultasi langsung ke admin via WhatsApp.
- **Formulir Kemitraan**: Memungkinkan calon mitra untuk mengirimkan tawaran kerja sama secara langsung.

### Backend (Admin Dashboard)
- **Dashboard Statistik**: Ringkasan data produk dan pesan masuk.
- **Manajemen Produk**: CRUD produk lengkap dengan upload foto galeri.
- **Otomasi Gambar**: Kompresi otomatis gambar ke format WebP untuk performa website yang lebih cepat.
- **Manajemen Kategori**: Pengaturan kategori produk yang fleksibel.
- **Pengaturan Web Dinamis**: Ubah Logo, Nama Bisnis, Kontak, Link Sosial Media, hingga Video Hero langsung dari panel admin.
- **Manajemen Leads**: Kelola data pesan dari formulir kontak dan penawaran kemitraan.

## 🛠️ Teknologi & Library

### Core
- **Framework**: CodeIgniter 4.7.2 (PHP 8.2+)
- **Database**: MySQL / MariaDB
- **Frontend Framework**: Bootstrap 5
- **Template Engine**: CI4 View Cells & Layouts

### Library & Plugins
- **ScrollReveal**: Untuk animasi elemen saat di-scroll.
- **FontAwesome 6**: Library ikon vektor premium.
- **SweetAlert2**: Notifikasi dan konfirmasi aksi yang interaktif.
- **Google Fonts (Outfit)**: Tipografi modern dan profesional.
- **GD Library**: Digunakan untuk pemrosesan dan kompresi gambar.

## ⚙️ Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project ini di lingkungan lokal Anda:

1. **Clone Repository**
   ```bash
   git clone https://github.com/FelixWahyu/alkes-fulki-hasya.git
   cd alkes-fulki-hasya
   ```

2. **Install Dependensi**
   Pastikan Anda sudah menginstal [Composer](https://getcomposer.org/).
   ```bash
   composer install
   ```

3. **Konfigurasi Environment**
   Salin file `env` menjadi `.env` dan sesuaikan konfigurasinya.
   ```bash
   cp env .env
   ```
   Buka file `.env` dan atur database serta base URL:
   ```env
   database.default.hostname = localhost
   database.default.database = nama_database_anda
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi
   
   app.baseURL = 'http://localhost:8080/'
   ```

4. **Persiapan Database**
   Import file database (jika ada di folder database/sql) atau jalankan migrasi jika tersedia.

5. **Jalankan Server Lokal**
   ```bash
   php spark serve
   ```
   Akses website melalui browser di: `http://localhost:8080`

## 📁 Struktur Direktori
- `app/Controllers`: Logika aplikasi (Frontend & Admin).
- `app/Models`: Pengelolaan data database.
- `app/Views`: Template tampilan website.
- `public/uploads`: Folder penyimpanan gambar produk dan media web.

---
Dikembangkan dengan ❤️ untuk **Fulki Hasya**.

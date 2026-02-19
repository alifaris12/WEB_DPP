<p align="center">
    <img src="public/images/FEB-UB-Black-Teks-min 1.png" width="300" alt="FEB UB Logo">
</p>

<h1 align="center">Sistem Manajemen Program FEB UB</h1>

<p align="center">
    <strong>Platform Digital untuk Manajemen Program Penelitian, Pengabdian, dan Kerjasama</strong>
</p>

<p align="center">
    <a href="#features">Features</a> •
    <a href="#technology-stack">Tech Stack</a> •
    <a href="#installation">Installation</a> •
    <a href="#usage">Usage</a> •
    <a href="#contributing">Contributing</a> •
    <a href="#license">License</a>
</p>

---

## 🏛️ About

**Sistem Manajemen Program FEB UB** adalah platform digital komprehensif yang dirancang untuk mengelola program penelitian, pengabdian masyarakat, dan kerjasama nasional maupun internasional di Fakultas Ekonomi dan Bisnis Universitas Brawijaya. Aplikasi web modern ini memfasilitasi pengelolaan data program secara efisien dengan fitur CRUD lengkap, import/export Excel, dan sistem akses berbasis peran (role-based access control).

### 🎯 Mission

Menciptakan sistem manajemen program yang efisien, transparan, dan mudah digunakan untuk mendukung pengelolaan program akademik di Fakultas Ekonomi dan Bisnis Universitas Brawijaya.

## ✨ Features

### 📊 **Manajemen Program Penelitian & Pengabdian**

-   **CRUD Lengkap**: Create, Read, Update, Delete untuk program penelitian dan pengabdian
-   **Filter & Pencarian**: Filter berdasarkan skema, tahun, dan pencarian berdasarkan judul, ketua, atau anggota
-   **Pagination Dinamis**: Opsi jumlah item per halaman (10, 25, 50, 100, 200, 500)
-   **Import Excel**: Upload data program secara massal melalui file Excel
-   **Template Excel**: Download template Excel untuk memudahkan input data
-   **Modal Detail & Edit**: Popup modal untuk melihat dan mengedit detail program

### 🌍 **Manajemen Program Kerjasama**

-   **Kerjasama Nasional & Internasional**: Kelola program kerjasama dengan mitra nasional dan internasional
-   **Informasi Lengkap**: Data mitra kerjasama, tahun, jangka waktu, tanggal mulai, dan tanggal selesai
-   **Filter Berdasarkan Tingkat**: Filter program berdasarkan tingkat (nasional/internasional)
-   **Filter Tanggal Otomatis**: User biasa hanya melihat program yang belum selesai (tanggal selesai >= hari ini)
-   **Import Excel**: Upload data kerjasama melalui file Excel

### 👥 **Sistem Autentikasi & Role-Based Access**

-   **Dual Role System**:
    -   **Admin**: Akses penuh untuk CRUD semua program
    -   **User**: Akses read-only dengan filter otomatis untuk program yang masih aktif
-   **Dashboard Terpisah**: Dashboard berbeda untuk admin dan user biasa
-   **Profil Pengguna**: Manajemen profil pengguna dengan update informasi dan password
-   **Keamanan**: Middleware untuk proteksi route berdasarkan role

### 🔍 **Fitur Pencarian & Filter**

-   **Pencarian Multi-Kolom**: Pencarian berdasarkan judul, ketua, anggota (untuk program penelitian/pengabdian)
-   **Pencarian Mitra**: Pencarian berdasarkan nama mitra kerjasama
-   **Filter Tahun**: Filter data berdasarkan tahun program
-   **Filter Skema/Tingkat**: Filter berdasarkan skema (penelitian/pengabdian) atau tingkat (nasional/internasional)
-   **Pagination dengan Query String**: Filter tetap terjaga saat navigasi halaman

### 📤 **Import & Export Data**

-   **Import Excel**: Upload data program melalui file Excel (.xls, .xlsx)
-   **Template Excel**: Template standar untuk memastikan format data konsisten
-   **Validasi Data**: Validasi otomatis saat import untuk memastikan data valid
-   **Error Handling**: Penanganan error yang user-friendly saat import gagal

### 🎨 **User Interface**

-   **Responsive Design**: Desain yang responsif untuk desktop, tablet, dan mobile
-   **Modern UI/UX**: Interface yang modern dan user-friendly
-   **Modal Popups**: Modal untuk detail dan edit program tanpa reload halaman
-   **Loading States**: Indikator loading untuk operasi async
-   **Toast Notifications**: Notifikasi sukses/error yang informatif

## 🛠️ Technology Stack

### **Backend**

-   **Framework**: Laravel 10.x
-   **Database**: MySQL
-   **Authentication**: Laravel Breeze
-   **Excel Processing**: Maatwebsite/Excel 3.1
-   **Date Handling**: Carbon
-   **ORM**: Eloquent ORM

### **Frontend**

-   **Templating**: Blade Templates
-   **CSS Framework**: Tailwind CSS 3.1, Bootstrap 5.2
-   **JavaScript**:
    -   Alpine.js 3.4 (untuk interaktivitas)
    -   Vue.js 3.2 (untuk komponen)
    -   Vanilla JavaScript (untuk modal dan interaksi)
-   **Build Tool**: Vite 7.1
-   **Icons**: Font Awesome 6.0

### **Development Tools**

-   **Testing**: Pest PHP 2.0
-   **Code Quality**: Laravel Pint
-   **Package Manager**: Composer (PHP), NPM (JavaScript)

## 🚀 Installation

### Prerequisites

-   PHP >= 8.1
-   Composer
-   Node.js >= 16.x
-   MySQL >= 8.0
-   Git

### Setup Instructions

1. **Clone the repository**

```bash
git clone https://https://github.com/alifaris12/Magang.git
cd project
```

2. **Install PHP dependencies**

```bash
composer install
```

3. **Install Node.js dependencies**

```bash
npm install
```

4. **Environment configuration**

```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure database**

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=username_database
DB_PASSWORD=password_database
```

6. **Run database migrations**

```bash
php artisan migrate --seed
```

7. **Build frontend assets**

```bash
# Development
npm run dev

# Production
npm run build
```

8. **Start the development server**

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## 📖 Usage

### **Untuk Administrator**

1. **Login sebagai Admin**

    - Akses `/login`
    - Gunakan kredensial admin yang telah dibuat

2. **Dashboard Admin**

    - Akses `/admin/dashboard` setelah login
    - Pilih kategori program: Penelitian & Pengabdian atau Kerjasama

3. **Manajemen Program Penelitian & Pengabdian**

    - **Tambah Program**: Klik "Tambah Program" atau akses `/program-penelitian/program/input`
    - **Upload Excel**: Akses `/program-upload` untuk upload data massal
    - **Daftar Program**: Akses `/program-penelitian/program-daftar` untuk melihat semua program
    - **Edit/Hapus**: Gunakan tombol aksi di tabel untuk edit atau hapus program

4. **Manajemen Program Kerjasama**
    - **Tambah Kerjasama**: Klik "Tambah Program" atau akses `/program-kerjasama/input`
    - **Upload Excel**: Akses `/program-kerjasama/upload` untuk upload data massal
    - **Daftar Kerjasama**: Akses `/program-kerjasama` untuk melihat semua program kerjasama
    - **Edit/Hapus**: Gunakan tombol aksi di tabel untuk edit atau hapus program

### **Untuk User Biasa**

1. **Login sebagai User**

    - Akses `/login` atau `/register` untuk membuat akun baru
    - Login dengan kredensial yang telah didaftarkan

2. **Dashboard User**

    - Akses `/dashboard` setelah login
    - Pilih kategori program yang ingin dilihat

3. **Melihat Program**

    - **Program Penelitian & Pengabdian**: Akses `/user/program-daftar`
    - **Program Kerjasama**: Akses `/user/program-kerjasama`
    - User hanya dapat melihat program yang masih aktif (untuk kerjasama: tanggal selesai >= hari ini)
    - Fitur edit, hapus, dan tambah program **tidak tersedia** untuk user biasa

4. **Filter & Pencarian**
    - Gunakan filter yang tersedia untuk mempersempit hasil pencarian
    - Pencarian dapat dilakukan berdasarkan judul, ketua, atau anggota (untuk penelitian/pengabdian)
    - Pencarian berdasarkan nama mitra (untuk kerjasama)

## 📱 Key Pages

### **Admin Pages**

-   **Dashboard Admin** (`/admin/dashboard`): Halaman utama admin dengan pilihan kategori program
-   **Daftar Program Penelitian** (`/program-penelitian/program-daftar`): Daftar lengkap program penelitian & pengabdian
-   **Input Program** (`/program-penelitian/program/input`): Form input program baru
-   **Upload Excel** (`/program-upload`): Upload data program via Excel
-   **Daftar Kerjasama** (`/program-kerjasama`): Daftar program kerjasama nasional & internasional
-   **Input Kerjasama** (`/program-kerjasama/input`): Form input program kerjasama baru
-   **Upload Excel Kerjasama** (`/program-kerjasama/upload`): Upload data kerjasama via Excel

### **User Pages**

-   **Dashboard User** (`/dashboard`): Halaman utama user dengan pilihan kategori program
-   **Daftar Program** (`/user/program-daftar`): Daftar program penelitian & pengabdian (read-only)
-   **Daftar Kerjasama** (`/user/program-kerjasama`): Daftar program kerjasama (read-only, hanya yang aktif)
-   **Profil** (`/profile`): Manajemen profil pengguna

## 🔧 Configuration

### **Database Configuration**

Pastikan konfigurasi database di file `.env` sudah benar:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### **Excel Import Configuration**

Template Excel untuk import program harus memiliki kolom berikut:

-   `tahun` / `Tahun` / `TAHUN`
-   `kategori` / `Kategori` / `KATEGORI`
-   `skema` / `Skema` / `SKEMA`
-   `judul` / `Judul` / `JUDUL`
-   `ketua` / `Ketua` / `KETUA`
-   `anggota` / `Anggota` / `ANGGOTA` (opsional)
-   `dana` / `Dana` / `DANA`

### **Role Configuration**

Sistem menggunakan dua role utama:

-   **admin**: Akses penuh untuk semua fitur
-   **user**: Akses read-only dengan filter otomatis

Role dapat diatur melalui kolom `role` di tabel `users`.

## 📊 Database Structure

### **Tables**

1. **users**: Data pengguna (admin dan user biasa)
2. **programs**: Data program penelitian dan pengabdian
3. **program_kerjasama**: Data program kerjasama nasional dan internasional
4. **sessions**: Session management
5. **password_reset_tokens**: Token untuk reset password

### **Key Fields**

**Programs Table:**

-   `tahun`: Tahun program
-   `kategori`: Kategori program (penelitian/pengabdian)
-   `skema`: Skema program
-   `judul`: Judul program
-   `ketua`: Nama ketua program
-   `anggota`: Nama anggota (nullable)
-   `dana`: Jumlah dana program

**Program Kerjasama Table:**

-   `mitra_kerjasama`: Nama mitra kerjasama
-   `tahun`: Tahun kerjasama
-   `jangka_waktu`: Jangka waktu kerjasama
-   `tanggal_mulai`: Tanggal mulai kerjasama
-   `tanggal_selesai`: Tanggal selesai kerjasama
-   `tingkat`: Tingkat kerjasama (nasional/internasional)

## 🤝 Contributing

Kami menyambut kontribusi dari komunitas! Silakan ikuti langkah-langkah berikut:

1. Fork repository ini
2. Buat feature branch (`git checkout -b feature/amazing-feature`)
3. Commit perubahan Anda (`git commit -m 'Add some amazing feature'`)
4. Push ke branch (`git push origin feature/amazing-feature`)
5. Buka Pull Request

### **Development Guidelines**

-   Ikuti PSR-12 coding standards untuk PHP
-   Gunakan ESLint dan Prettier untuk JavaScript/React code
-   Tulis commit message yang bermakna
-   Sertakan test untuk fitur baru
-   Update dokumentasi sesuai kebutuhan

## 🙏 Acknowledgments

-   **Fakultas Ekonomi dan Bisnis Universitas Brawijaya** untuk visi dan dukungannya
-   **Laravel Community** untuk framework yang luar biasa
-   **Maatwebsite** untuk package Excel yang powerful
-   **Open Source Contributors** yang membuat proyek ini mungkin

## 📞 Contact

**Fakultas Ekonomi dan Bisnis Universitas Brawijaya**

-   **Website**: [https://feb.ub.ac.id](https://feb.ub.ac.id)

---

<p align="center">
    <sub>Empowering academic program management through digital innovation</sub>
</p>

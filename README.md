# HikmaTown

Aplikasi latihan Laravel untuk Blade, Eloquent, migration, seeding, CRUD pegawai, dan autentikasi berbasis session. Database bawaan proyek menggunakan SQLite.

## Fitur

- Login dan logout menggunakan autentikasi Laravel.
- Dashboard dan menu aplikasi hanya dapat diakses setelah login.
- Percobaan login dibatasi hingga 5 kali per menit.
- CRUD pegawai: daftar, tambah, detail, ubah, dan hapus.
- Migration untuk tabel `users` dan `employes`.
- Seeder untuk akun demo dan hingga 20 data pegawai.
- Halaman Home, Product, About, Mahasiswa, dan Kalkulator.

## Akun demo

| Kolom    | Nilai                     |
| -------- | ------------------------- |
| Email    | `admin.demo@example.test` |
| Password | `demo`                    |

Password tidak disimpan di README atau source code. Atur password lokal sebelum menjalankan seeder.

## Menjalankan aplikasi

Jalankan perintah berikut di PowerShell dari folder `web-app`:

```powershell
composer install
if (-not (Test-Path .env)) { Copy-Item .env.example .env }
if (-not (Test-Path database\database.sqlite)) {
    New-Item -ItemType File -Path database\database.sqlite
}
```

Pastikan pengaturan berikut tersedia di `.env`:

```dotenv
DB_CONNECTION=sqlite
DEMO_ADMIN_PASSWORD=isi-dengan-password-pilihan-anda
```

Kemudian jalankan:

```powershell
php artisan config:clear
php artisan migrate
php artisan db:seed
php artisan serve
```

Buka aplikasi di alamat lokal yang ditampilkan oleh `php artisan serve`. Login memakai email demo di atas dan password yang Anda atur di `.env`. Setelah login, halaman pegawai tersedia melalui `/employes`.

Untuk instalasi baru saja, jalankan `php artisan key:generate` satu kali jika `APP_KEY` di `.env` masih kosong.

Seeder pegawai menambah data hingga jumlah total 20 dan tidak menghapus data yang sudah ada. Migration biasa (`php artisan migrate`) juga mempertahankan data; hindari `php artisan migrate:fresh` kecuali database memang boleh dihapus.

## Pengujian

```powershell
php artisan test --compact
```

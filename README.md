# Profil Akademik

Aplikasi web perkuliahan yang merangkai **profil mahasiswa** dan **ide riset
*agentic AI*** di atas satu master layout Blade. Dibangun untuk Tugas 04,
mata kuliah Framework Programming.

| | |
|---|---|
| Nama | Justin Valentino |
| NRP | 5025241234 |
| Jurusan | Teknik Informatika |
| Fakultas | FTE — Institut Teknologi Sepuluh Nopember |
| Tugas | 02 — Multi-View Layout |

## Halaman

| Rute | Nama rute | Isi |
| --- | --- | --- |
| `/` | `beranda` | Hero, indeks konten, dan metadata tugas. Membaca query string `?user=Nama` untuk nama pada sapaan. |
| `/profil-mahasiswa` | `profil` | Blok identitas dari `<x-profile-card>`, plus aside asal data. |
| `/ide-agent` | `ide-agent` | Rancangan *Database Monitoring Health* dalam lima bagian bernomor. Mode gelap lewat `?mode=dark`. |

## Tumpukan Teknologi

| Lapisan | Teknologi |
| --- | --- |
| Framework | Laravel Framework 13 |
| Bahasa | PHP `^8.3` |
| Tampilan | Blade, class component (`x-profile-card`, `x-alert`, `x-icon`) |
| CSS | Bootstrap 5.3 untuk grid & utilitas, Sass untuk design token |
| Bundler | Vite 8 |
| Pengujian | PHPUnit 12 |

### Instalasi

```bash
composer install
npm install

cp .env.example .env
php artisan key:generate
php artisan migrate
```

Seluruh perintah di atas juga dapat dijalankan sekaligus lewat
`composer run setup`.

### Pengembangan

```bash
php artisan dev
```

Menjalankan tiga proses sekaligus dalam satu TUI — `serve`, `queue:listen`,
dan `vite` — dengan auto-restart bila ada proses yang mati. Ada
`php artisan dev:list` untuk melihat daftarnya.

Alternatif bila ingin proses terpisah:

```bash
php artisan serve      # http://127.0.0.1:8000
npm run dev            # Vite dev server, HMR untuk SCSS
```

### Build produksi

```bash
npm run build
```

### Pengujian

```bash
php artisan test
```
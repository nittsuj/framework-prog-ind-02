<!DOCTYPE html>
{{--
    Master Layout Terpusat.
    Semua view anak WAJIB melakukan @extends('layouts.app') agar tidak ada
    duplikasi struktur HTML (prinsip DRY).

    Arah visual: EDITORIAL / TIPOGRAFIS.
    Tidak ada navbar berwarna, tidak ada badge pil, tidak ada kartu berbayang.
    Pembatas antar bagian memakai hairline rule (class .rule) dan hierarki
    tipografi; satu warna aksen (vermilion) dipakai hemat.

    Variabel opsional:
    - $title     : judul halaman (dikirim via @section('title') atau default).
    - $modeGelap : boolean; bila true, seluruh halaman memakai tema gelap.
--}}
{{-- data-bs-theme adalah fitur color mode Bootstrap 5.3; mengganti seluruh palet. --}}
<html lang="id" data-bs-theme="{{ ($modeGelap ?? false) ? 'dark' : 'light' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Judul halaman dinamis: bisa di-override tiap view via @section('title', ...). --}}
    <title>@yield('title', 'Aplikasi Profil Akademik')</title>

    {{-- Memuat Bootstrap (SCSS) & JS melalui Vite. TANPA CDN, TANPA webfont. --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<div class="page">
    <div class="measure">

        {{-- ================= MASTHEAD ================= --}}
        <header>
            {{-- Strip utilitas: konteks pengguna, bukan navigasi. --}}
            <div class="d-flex flex-wrap justify-content-between gap-2 py-2 eyebrow">
                <span>Framework Programming &middot; Tugas 02</span>
                <span class="d-none d-sm-inline">Institut Teknologi Sepuluh Nopember</span>
            </div>

            {{-- Garis masthead: dua lapis, tebal di atas, tipis di bawah. --}}
            <hr class="rule rule--heavy">

            <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 py-3">
                {{-- Wordmark. Aksen dipakai pada satu kata saja. --}}
                <a class="wordmark" href="{{ route('beranda') }}">
                    Profil <em>Akademik</em>
                </a>

                {{-- Navigasi. Tautan aktif ditandai aria-current, bukan warna latar. --}}
                <nav class="no-print" aria-label="Navigasi utama">
                    <ul class="nav-editorial">
                        <li>
                            <a href="{{ route('beranda') }}"
                               @if (request()->routeIs('beranda')) aria-current="page" @endif>Beranda</a>
                        </li>
                        <li>
                            <a href="{{ route('profil') }}"
                               @if (request()->routeIs('profil')) aria-current="page" @endif>Profil</a>
                        </li>
                        <li>
                            <a href="{{ route('ide-agent') }}"
                               @if (request()->routeIs('ide-agent')) aria-current="page" @endif>Ide Agen</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <hr class="rule rule--flush">
        </header>

        {{-- ================= KONTEN DINAMIS ================= --}}
        {{-- Setiap view anak mengisi section 'content'. --}}
        <main class="page-main py-5">
            @yield('content')
        </main>

        {{-- ================= FOOTER ================= --}}
        <footer class="mt-auto no-print">
            <hr class="rule rule--flush">
            <div class="d-flex flex-wrap justify-content-between gap-2 py-3 eyebrow">
                <span>&copy; {{ date('Y') }} Justin Valentino</span>
                <span>Laravel &middot; Blade &middot; Bootstrap 5.3 &middot; Vite</span>
            </div>
        </footer>

    </div>
</div>

</body>
</html>

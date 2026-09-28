{{-- Halaman Profil Mahasiswa (/profil-mahasiswa) --}}
@extends('layouts.app')

@section('title', 'Profil Mahasiswa — Aplikasi Profil Akademik')

@section('content')

    {{-- ================= KEPALA HALAMAN ================= --}}
    <span class="eyebrow eyebrow--ruled mb-4">Bagian 01 &mdash; Identitas</span>

    <div class="row g-4 align-items-end mb-5">
        <div class="col-lg-7">
            <h1 class="page-title mb-3">Profil Mahasiswa</h1>
            <p class="lede mb-0">
                Satu blok data identitas, dirender sekali oleh komponen Blade
                dan dipakai ulang di seluruh aplikasi.
            </p>
        </div>
        <div class="col-lg-5">
            <div class="cluster justify-content-lg-end no-print">
                <span class="tag tag--ok">Data Akademik</span>
            </div>
        </div>
    </div>

    <hr class="rule rule--heavy">

    {{-- ================= ISI ================= --}}
    <div class="row g-5 mt-0">

        {{-- Memanggil komponen Card reusable; data dikirim dari PageController. --}}
        <div class="col-lg-7">
            <x-profile-card
                :nama="$mahasiswa['nama']"
                :nrp="$mahasiswa['nrp']"
                :jurusan="$mahasiswa['jurusan']" />
        </div>

        {{-- Aside: sumber data & cara kerja komponen. --}}
        <div class="col-lg-5">
            <h2 class="aside-heading">Asal Data</h2>

            <dl class="mt-4 mb-0">
                <div class="meta">
                    <dt class="meta__label">Sumber</dt>
                    <dd class="meta__value mb-0"><code>PageController</code></dd>
                </div>
                <div class="meta">
                    <dt class="meta__label">Bentuk</dt>
                    <dd class="meta__value mb-0">Konstanta <code>MAHASISWA</code></dd>
                </div>
                <div class="meta">
                    <dt class="meta__label">Rute</dt>
                    <dd class="meta__value mono mb-0">/profil-mahasiswa</dd>
                </div>
                <div class="meta">
                    <dt class="meta__label">Komponen</dt>
                    <dd class="meta__value mb-0"><code>&lt;x-profile-card&gt;</code></dd>
                </div>
            </dl>

            <p class="index-list__note mt-4 mb-0">
                Setiap props komponen punya nilai default, sehingga
                <code>&lt;x-profile-card /&gt;</code> tanpa argumen pun tetap
                merender identitas yang sama.
            </p>
        </div>

    </div>

@endsection

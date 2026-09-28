{{-- Halaman Beranda (/) — menangkap parameter ?user=Nama --}}
@extends('layouts.app')

@section('title', 'Beranda — Aplikasi Profil Akademik')

@section('content')

    {{-- ================= HERO ================= --}}
    {{-- $nama berasal dari PageController (default: Justin Valentino). --}}
    <span class="eyebrow eyebrow--ruled mb-4">Beranda</span>

    <h1 class="page-title mb-4">
        Aplikasi Multi-View<br>
        Profil Akademik
    </h1>

    <p class="lede mb-4">
        Tugas perkuliahan Laravel — merangkai profil mahasiswa dan ide riset
        <em>agentic AI</em> di atas satu layout terpusat.
    </p>

    {{-- Sapaan memakai komponen reusable <x-alert>. --}}
    <x-alert type="primary" icon="user" :dismissible="false" class="mb-5">
        Selamat datang, <strong>{{ $nama }}</strong>. Halaman di bawah adalah indeks
        seluruh bagian yang tersedia.
    </x-alert>

    <hr class="rule rule--heavy">

    {{-- ================= INDEKS KONTEN ================= --}}
    {{-- Daftar indeks editorial, bukan grid kartu berisi emoji. --}}
    <div class="row g-5 mt-0">

        <div class="col-lg-7">
            <h2 class="aside-heading">Indeks</h2>

            <ol class="index-list mt-4">
                <li>
                    <span class="index-list__num">01</span>
                    <div>
                        <a class="index-list__title" href="{{ route('profil') }}">
                            Profil Mahasiswa
                        </a>
                        <p class="index-list__note mb-0">
                            Identitas akademik dalam satu blok tipografi —
                            dirender oleh komponen <code>&lt;x-profile-card&gt;</code>.
                        </p>
                    </div>
                    <a class="index-list__arrow" href="{{ route('profil') }}"
                       tabindex="-1" aria-hidden="true">
                        <x-icon name="arrow-right" :size="20" />
                    </a>
                </li>

                <li>
                    <span class="index-list__num">02</span>
                    <div>
                        <a class="index-list__title" href="{{ route('ide-agent') }}">
                            Ide Agen AI
                        </a>
                        <p class="index-list__note mb-0">
                            Rancangan <em>Database Monitoring Health</em>: dasbor
                            kesehatan basis data, peranan agen, dan formulir usulan.
                        </p>
                    </div>
                    <a class="index-list__arrow" href="{{ route('ide-agent') }}"
                       tabindex="-1" aria-hidden="true">
                        <x-icon name="arrow-right" :size="20" />
                    </a>
                </li>

                <li>
                    <span class="index-list__num">03</span>
                    <div>
                        <a class="index-list__title" href="{{ route('beranda', ['user' => $nama]) }}">
                            Parameter <span class="muted">?user=</span>
                        </a>
                        <p class="index-list__note mb-0">
                            Halaman ini membaca <code>?user=Nama</code> dari query
                            string untuk sapaan di atas.
                        </p>
                    </div>
                    <a class="index-list__arrow"
                       href="{{ route('beranda', ['user' => $nama]) }}"
                       tabindex="-1" aria-hidden="true">
                        <x-icon name="arrow-right" :size="20" />
                    </a>
                </li>
            </ol>
        </div>

        {{-- Aside: metadata editorial, menggantikan "3 kartu fitur". --}}
        <div class="col-lg-5">
            <h2 class="aside-heading">Keterangan</h2>

            <dl class="mt-4 mb-0">
                <div class="meta">
                    <dt class="meta__label">Mata Kuliah</dt>
                    <dd class="meta__value mb-0">Framework Programming</dd>
                </div>
                <div class="meta">
                    <dt class="meta__label">Tugas</dt>
                    <dd class="meta__value mb-0">02 &mdash; Multi-View</dd>
                </div>
                <div class="meta">
                    <dt class="meta__label">Framework</dt>
                    <dd class="meta__value mb-0">Laravel 13</dd>
                </div>
                <div class="meta">
                    <dt class="meta__label">Tampilan</dt>
                    <dd class="meta__value mb-0">Blade &middot; Bootstrap 5.3</dd>
                </div>
                <div class="meta">
                    <dt class="meta__label">Build</dt>
                    <dd class="meta__value mb-0">Vite &mdash; tanpa CDN</dd>
                </div>
            </dl>

            <div class="cluster mt-4">
                <x-icon name="check" :size="16" class="muted" />
                <span class="caption">
                    Seluruh aset dikompilasi lokal.
                </span>
            </div>
        </div>

    </div>

@endsection

{{-- Halaman Ide Riset (/ide-agent) — Konten: "Database Monitoring Health" --}}
{{--
    Mode gelap dikendalikan oleh parameter ?mode=dark.
    Variabel $modeGelap (dikirim PageController) diteruskan ke layout, lalu layout
    menerapkan atribut data-bs-theme="dark" pada elemen <html> secara dinamis.

    Gaya halaman: satu alur bagian bernomor (01–05) yang dipisah hairline rule,
    bukan tumpukan kartu. Tidak ada emoji; ikon memakai <x-icon>.
--}}
@extends('layouts.app')

@section('title', 'Ide Riset: Database Monitoring Health — Aplikasi Profil Akademik')

@section('content')

    {{-- ================= KEPALA HALAMAN ================= --}}
    <span class="eyebrow eyebrow--ruled mb-4">Bagian 02 &mdash; Ide Riset</span>

    <div class="d-flex flex-wrap justify-content-between align-items-end gap-4 mb-5">
        <div>
            <h1 class="page-title mb-3">
                Agentic AI untuk<br>
                <em class="accent">Database Monitoring Health</em>
            </h1>
            <p class="lede mb-0">
                Draf ide riset &amp; formulir rancangan agen cerdas pemantau
                kesehatan basis data.
            </p>
        </div>

        {{-- Pengalih tema. Satu tombol, bukan sepasang badge. --}}
        <div class="no-print">
            @if ($modeGelap)
                <a class="btn-ghost" href="{{ route('ide-agent') }}">
                    <x-icon name="sun" :size="14" /> Mode Terang
                </a>
            @else
                <a class="btn-ghost" href="{{ route('ide-agent', ['mode' => 'dark']) }}">
                    <x-icon name="moon" :size="14" /> Mode Gelap
                </a>
            @endif
        </div>
    </div>

    <hr class="rule rule--heavy">

    {{-- Notifikasi status memakai komponen reusable <x-alert>. --}}
    <x-alert type="info" icon="info" class="mt-4">
        Halaman ini memvisualisasikan ide agen AI otonom yang memantau kesehatan
        database secara real-time. Tambahkan <code>?mode=dark</code> pada URL
        untuk tema gelap.
    </x-alert>

    {{-- ================= 01. DESKRIPSI ================= --}}
    <section class="mt-5">
        <span class="eyebrow eyebrow--ruled">01 &mdash; Deskripsi</span>

        <div class="row g-5">
            <div class="col-lg-7">
                <h2 class="mb-4">Bukan sekadar dasbor pasif</h2>

                <div class="prose">
                    <p>
                        <strong>Database Monitoring Health</strong> adalah sistem
                        pemantauan basis data yang tidak berhenti menampilkan metrik.
                        Sistem mengumpulkan latensi query, beban CPU dan memori,
                        koneksi aktif, ukuran penyimpanan, hingga jeda replikasi
                        dari PostgreSQL atau MySQL — lalu menilai kondisi database
                        secara menyeluruh.
                    </p>
                    <p>
                        Alih-alih menunggu administrator membaca dasbor, agen ini
                        memberi rekomendasi tindakan (menambah indeks, menghentikan
                        query lambat, memperluas connection pool) disertai alasan
                        yang dapat ditelusuri.
                    </p>
                </div>
            </div>

            <div class="col-lg-5">
                <h3 class="aside-heading">Parameter Rancangan</h3>

                <dl class="mt-4 mb-0">
                    <div class="meta">
                        <dt class="meta__label">Mesin Target</dt>
                        <dd class="meta__value mb-0">PostgreSQL</dd>
                    </div>
                    <div class="meta">
                        <dt class="meta__label">Otonomi</dt>
                        <dd class="meta__value mb-0">Level 2 &mdash; Human-in-the-loop</dd>
                    </div>
                    <div class="meta">
                        <dt class="meta__label">Interval</dt>
                        <dd class="meta__value mono mb-0">30 detik</dd>
                    </div>
                    <div class="meta">
                        <dt class="meta__label">Skala</dt>
                        <dd class="meta__value mb-0">Multi-tenant</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    {{-- ================= 02. PERAN AGEN ================= --}}
    <section class="mt-5">
        <span class="eyebrow eyebrow--ruled">02 &mdash; Peran Agentic AI</span>

        <div class="row g-5">
            <div class="col-lg-5">
                <h2 class="section-heading">Lima Tahapan Reasoning</h2>
                <p class="index-list__note mt-3 mb-0">
                    Setiap tahap menghasilkan artefak yang dapat diaudit, sehingga
                    keputusan otonom tetap bisa ditelusuri oleh operator.
                </p>
            </div>

            <div class="col-lg-7">
                {{-- Daftar bernomor; angka dihasilkan CSS, bukan badge Bootstrap. --}}
                <ol class="ordered-list mb-0">
                    @php
                        $peran = [
                            ['Perception',  'Mengumpulkan metrik & log database secara kontinu.'],
                            ['Reasoning',   'Menganalisis anomali memakai LLM dan aturan ambang batas.'],
                            ['Planning',    'Menyusun rencana perbaikan berurutan sesuai prioritas.'],
                            ['Action',      'Mengeksekusi perbaikan aman: auto-vacuum, index tuning.'],
                            ['Reflection',  'Mengevaluasi hasil tindakan dan belajar dari umpan balik.'],
                        ];
                    @endphp

                    @foreach ($peran as [$judul, $teks])
                        <li>
                            <div>
                                <strong>{{ $judul }}</strong>
                                <span class="index-list__note d-block mb-0">{{ $teks }}</span>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>

    {{-- ================= 03. DASBOR KESEHATAN ================= --}}
    <section class="mt-5">
        <span class="eyebrow eyebrow--ruled">03 &mdash; Dasbor Kesehatan</span>

        @php
            // Data metrik disusun dalam array agar tampilan di-render lewat
            // perulangan (DRY). "tag" menentukan penanda titik status, bukan
            // warna komponen Bootstrap.
            $metrik = [
                ['label' => 'Kesehatan Query',  'nilai' => 92, 'tag' => 'ok',   'catatan' => 'Stabil'],
                ['label' => 'Connection Pool',  'nilai' => 78, 'tag' => 'ok',   'catatan' => 'Normal'],
                ['label' => 'Replikasi (Lag)',  'nilai' => 96, 'tag' => 'ok',   'catatan' => 'Sinkron'],
                ['label' => 'Kapasitas Storage','nilai' => 64, 'tag' => 'warn', 'catatan' => 'Pantau'],
                ['label' => 'Kesehatan Indeks', 'nilai' => 41, 'tag' => 'bad',  'catatan' => 'Perlu tindakan'],
            ];
        @endphp

        <div class="row g-5">
            {{-- Skor keseluruhan: angka besar, rata kiri, bukan kartu bulat. --}}
            <div class="col-lg-4">
                <p class="figure mb-2">74<span class="figure__unit">/100</span></p>
                <p class="eyebrow mb-3">Health Score Keseluruhan</p>
                <p class="mb-0">
                    <span class="tag tag--warn">Perlu perhatian</span>
                </p>
                <p class="index-list__note mt-3 mb-0">
                    Dua dari lima metrik keluar dari ambang aman. Agen merekomendasikan
                    <em>index tuning</em> pada tabel transaksi.
                </p>
            </div>

            {{-- Tabel metrik. Batang 2px menggantikan progress bar Bootstrap. --}}
            <div class="col-lg-8">
                <table class="table-editorial mb-0">
                    <caption>Snapshot 30 detik terakhir &middot; PostgreSQL</caption>
                    <thead>
                        <tr>
                            <th scope="col">Metrik</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="col-meter">Skor</th>
                            <th scope="col" class="num">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($metrik as $m)
                            <tr>
                                <td>{{ $m['label'] }}</td>
                                <td>
                                    <span class="tag tag--{{ $m['tag'] }}">{{ $m['catatan'] }}</span>
                                </td>
                                <td>
                                    <span class="meter" role="img"
                                          aria-label="{{ $m['label'] }} {{ $m['nilai'] }} persen">
                                        <span class="meter__fill meter__fill--{{ $m['tag'] }}"
                                              style="width: {{ $m['nilai'] }}%"></span>
                                    </span>
                                </td>
                                <td class="num">{{ $m['nilai'] }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- ================= 04. FITUR ================= --}}
    <section class="mt-5">
        <span class="eyebrow eyebrow--ruled">04 &mdash; Fitur Utama</span>

        <h2 class="mb-4">Cakupan yang direncanakan</h2>

        @php
            // Daftar fitur; dirender dengan perulangan agar ringkas dan konsisten.
            $fitur = [
                ['Real-time Metrics',       'Pemantauan latensi, throughput, dan koneksi tiap detik.'],
                ['Anomaly Detection',      'Deteksi otomatis pola tidak wajar dengan ML dan LLM.'],
                ['Auto-Remediation',       'Tindakan perbaikan terverifikasi tanpa intervensi manual.'],
                ['Natural Language Ops',   'Tanya kondisi database memakai bahasa sehari-hari.'],
                ['Guardrails & Audit',     'Setiap aksi tercatat dan dibatasi kebijakan keamanan.'],
                ['Laporan Otomatis',       'Rangkuman harian dan mingguan siap dibagikan ke tim.'],
            ];
        @endphp

        <div class="row g-5">
            @foreach (array_chunk($fitur, 3) as $kolom)
                <div class="col-md-6">
                    <ol class="ordered-list mb-0">
                        @foreach ($kolom as [$judul, $teks])
                            <li>
                                <div>
                                    <strong>{{ $judul }}</strong>
                                    <span class="index-list__note d-block mb-0">{{ $teks }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ================= 05. FORMULIR ================= --}}
    <section class="mt-5 mb-2">
        <span class="eyebrow eyebrow--ruled">05 &mdash; Formulir Rancangan</span>

        <div class="row g-5">
            <div class="col-lg-4">
                <h2 class="section-heading">Usulan Agen</h2>
                <p class="index-list__note mb-0">
                    Draf untuk mengusulkan atau menyempurnakan ide agen pemantau
                    database. Formulir diarahkan ke halaman yang sama dengan method
                    GET, sehingga pilihan tersimpan di query string dan bisa dibagikan.
                </p>
            </div>

            {{-- Formulir demonstrasi; diarahkan ke halaman yang sama. --}}
            <div class="col-lg-8">
                <form action="{{ route('ide-agent', $modeGelap ? ['mode' => 'dark'] : []) }}"
                      method="GET" class="row g-4">

                    <div class="col-md-6">
                        <label for="judulIde" class="form-label">Judul Ide</label>
                        <input type="text" class="form-control" id="judulIde" name="judul"
                               value="Database Monitoring Health"
                               placeholder="Contoh: Autonomous DBA Agent">
                    </div>

                    <div class="col-md-6">
                        <label for="engine" class="form-label">Mesin Database Target</label>
                        <select class="form-select" id="engine" name="engine">
                            <option selected>PostgreSQL</option>
                            <option>MySQL</option>
                            <option>MariaDB</option>
                            <option>SQL Server</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
                            placeholder="Jelaskan tujuan agen dan masalah yang diselesaikan...">Agen AI yang memantau kesehatan database dan melakukan perbaikan otonom dengan pengawasan human-in-the-loop.</textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="otonomi" class="form-label">Level Otonomi Agen</label>
                        <select class="form-select" id="otonomi" name="otonomi">
                            <option>1 &mdash; Sarankan saja (Advisory)</option>
                            <option selected>2 &mdash; Setujui lalu jalankan (Human-in-the-loop)</option>
                            <option>3 &mdash; Otonom penuh dengan batasan</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="interval" class="form-label">Interval Pemantauan (detik)</label>
                        <input type="number" class="form-control" id="interval" name="interval"
                               value="30" min="5" max="3600">
                    </div>

                    {{-- Pilihan fitur memakai checkbox Bootstrap. --}}
                    <div class="col-12">
                        <span class="form-label d-block">Fitur yang Diaktifkan</span>

                        <div class="d-flex flex-wrap gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       id="fiturAnomali" name="fitur[]" value="anomali" checked>
                                <label class="form-check-label" for="fiturAnomali">Anomaly Detection</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       id="fiturAuto" name="fitur[]" value="auto" checked>
                                <label class="form-check-label" for="fiturAuto">Auto-Remediation</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       id="fiturLaporan" name="fitur[]" value="laporkan">
                                <label class="form-check-label" for="fiturLaporan">Laporan Otomatis</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary">
                            Simpan Rancangan
                            <x-icon name="arrow-right" :size="15" class="ms-1" />
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection

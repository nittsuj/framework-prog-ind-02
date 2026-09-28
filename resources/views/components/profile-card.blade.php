{{--
    Komponen: <x-profile-card>
    Blok identitas mahasiswa. menggantikan "card" Bootstrap: tidak ada kotak
    dan tidak ada bayangan — hanya garis atas, monogram serif, dan daftar
    metadata berpisah hairline.

    Semua props bersifat opsional; nilai default = identitas mahasiswa.
    Contoh pemakaian: <x-profile-card /> atau <x-profile-card nama="Andi" />
--}}
@props([
    'nama'    => 'Justin Valentino',
    'nrp'     => '5025241234',
    'jurusan' => 'Teknik Informatika',
])

{{-- Inisial diambil dari nama; dipakai sebagai penanda visual di atas garis. --}}
@php
    $inisial = strtoupper(
        collect(explode(' ', trim($nama)))
            ->reject(fn ($kata) => $kata === '')
            ->take(2)
            ->map(fn ($kata) => mb_substr($kata, 0, 1))
            ->implode('')
    );
@endphp

<article {{ $attributes->merge(['class' => 'card']) }}>
    <div class="card-body">

        {{-- Monogram: inisial dalam serif besar, bukan avatar lingkaran biru. --}}
        <p class="monogram mb-4">{{ $inisial }}</p>

        <h2 class="display-name mb-2">{{ $nama }}</h2>
        <p class="muted mb-4">{{ $jurusan }}</p>

        {{-- Daftar identitas: baris meta, dipisah garis rambut. --}}
        <dl class="mb-0">
            <div class="meta">
                <dt class="meta__label">NRP</dt>
                <dd class="meta__value mono mb-0">{{ $nrp }}</dd>
            </div>
            <div class="meta">
                <dt class="meta__label">Jurusan</dt>
                <dd class="meta__value mb-0">{{ $jurusan }}</dd>
            </div>
            <div class="meta">
                <dt class="meta__label">Program Studi</dt>
                <dd class="meta__value mb-0">S1 Informatika</dd>
            </div>
            <div class="meta">
                <dt class="meta__label">Fakultas</dt>
                <dd class="meta__value mb-0">FTE</dd>
            </div>
            <div class="meta">
                <dt class="meta__label">Status</dt>
                <dd class="meta__value mb-0">
                    {{-- Titik status menggantikan badge pill berwarna. --}}
                    <span class="tag tag--ok">Aktif</span>
                </dd>
            </div>
        </dl>

    </div>
</article>

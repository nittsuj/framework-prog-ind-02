{{--
    Komponen: <x-alert>
    Notifikasi pesan dalam gaya editorial: latar netral + satu garis aksen di
    kiri, tanpa kotak berwarna dan tanpa bayangan.

    Props:
    - type        : semantik pesan, dipetakan ke label (lihat $label di bawah).
    - dismissible : tampilkan tombol tutup (default true). Memakai Bootstrap
                   Alert JS (data-bs-dismiss).
    - icon        : nama ikon untuk <x-icon> (bukan emoji). Default: tanpa ikon.

    Contoh: <x-alert type="success" icon="check">Data tersimpan.</x-alert>
--}}
@props([
    'type'        => 'info',
    'dismissible' => true,
    'icon'        => null,
])

@php
    // Peta tipe ke label. Semantik tetap terjaga, warna dibuang.
    $label = match ($type) {
        'success' => 'Terverifikasi',
        'warning' => 'Perhatian',
        'danger'  => 'Peringatan',
        'primary' => 'Sorotan',
        default   => 'Catatan',
    };
@endphp

<div {{ $attributes->merge(['class' => 'note']) }} role="note">

    <div class="note__body">
        <span class="eyebrow eyebrow--accent note__label">
            {{-- Ikon opsional, sejajar dengan label. --}}
            @if ($icon)
                <x-icon :name="$icon" :size="13" class="me-1" />
            @endif
            {{ $label }}
        </span>

        {{-- Isi pesan diambil dari slot komponen. --}}
        {{ $slot }}
    </div>

    {{-- Tombol dismiss. Ikon 'x' digambar sendiri, bukan sprite bawaan. --}}
    @if ($dismissible)
        <button type="button" class="note__close" data-bs-dismiss="alert" aria-label="Tutup">
            <x-icon name="x" :size="16" />
        </button>
    @endif
</div>

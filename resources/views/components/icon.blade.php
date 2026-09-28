{{--
    Komponen: <x-icon name="..." />
    Ikon garis (stroke) 24x24 yang mewarisi warna teks induknya lewat
    currentColor. Menggantikan emoji, yang tampil berbeda tiap platform.

    Props:
    - name : nama ikon (lihat daftar di bawah). Default: 'info'.
    - size : ukuran dalam piksel. Default: 16.

    Contoh: <x-icon name="database" :size="20" />
--}}
@props([
    'name' => 'info',
    'size' => 16,
])

<svg
    {{ $attributes->merge(['class' => 'ed-icon']) }}
    xmlns="http://www.w3.org/2000/svg"
    width="{{ $size }}"
    height="{{ $size }}"
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="1.5"
    stroke-linecap="round"
    stroke-linejoin="round"
    role="img"
    aria-hidden="true"
    focusable="false">

    @switch($name)
        @case('arrow-right')
            <path d="M4 12h15" />
            <path d="m13 5 7 7-7 7" />
            @break

        @case('arrow-up-right')
            <path d="M7 17 17 7" />
            <path d="M8 7h9v9" />
            @break

        @case('sun')
            <circle cx="12" cy="12" r="4" />
            <path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4" />
            @break

        @case('moon')
            <path d="M20 14.5A8.5 8.5 0 0 1 9.5 4a8.5 8.5 0 1 0 10.5 10.5Z" />
            @break

        @case('check')
            <path d="m4 12.5 5 5L20 6.5" />
            @break

        @case('alert')
            <path d="M12 4 2.8 20h18.4L12 4Z" />
            <path d="M12 10v4" />
            <path d="M12 17.2h.01" />
            @break

        @case('database')
            <ellipse cx="12" cy="6" rx="7.5" ry="3" />
            <path d="M4.5 6v12c0 1.7 3.4 3 7.5 3s7.5-1.3 7.5-3V6" />
            <path d="M4.5 12c0 1.7 3.4 3 7.5 3s7.5-1.3 7.5-3" />
            @break

        @case('activity')
            <path d="M2 12h4l3-7 4 14 3-7h6" />
            @break

        @case('shield')
            <path d="M12 3 5 6v5.5c0 4.3 2.9 8.2 7 9.5 4.1-1.3 7-5.2 7-9.5V6l-7-3Z" />
            <path d="m9 12 2 2 4-4" />
            @break

        @case('user')
            <circle cx="12" cy="8.5" r="3.5" />
            <path d="M4.5 20a7.5 7.5 0 0 1 15 0" />
            @break

        @case('doc')
            <path d="M14 3H7a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7l-4-4Z" />
            <path d="M14 3v4h4" />
            <path d="M9 13h6M9 17h4" />
            @break

        @default
            <circle cx="12" cy="12" r="9" />
            <path d="M12 11v5" />
            <path d="M12 7.6h.01" />
    @endswitch
</svg>

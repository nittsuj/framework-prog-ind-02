// Entry point JavaScript aplikasi.
// Memuat Bootstrap (dan Popper) via bundler Vite — bukan CDN.

// Popper dibutuhkan oleh komponen interaktif Bootstrap (dropdown, tooltip, popover).
import * as Popper from '@popperjs/core';

// Import seluruh plugin JavaScript Bootstrap (dropdown, modal, navbar, dsb).
import * as bootstrap from 'bootstrap';

// Ekspos ke global window agar komponen bisa diinisialisasi dari Blade bila perlu.
window.Popper = Popper;
window.bootstrap = bootstrap;

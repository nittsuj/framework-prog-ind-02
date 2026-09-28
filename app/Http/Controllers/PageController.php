<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * PageController tunggal yang menangani seluruh halaman fungsional aplikasi.
 * Menjaga routing tetap terpusat dan menghindari duplikasi logika.
 */
class PageController extends Controller
{
    /**
     * Data identitas mahasiswa dipusatkan di satu konstanta agar DRY
     * (dipakai ulang oleh halaman profil maupun komponen terkait).
     */
    private const MAHASISWA = [
        'nama' => 'Justin Valentino',
        'nrp' => '5025241234',
        'jurusan' => 'Teknik Informatika',
    ];

    /**
     * Halaman Beranda (/).
     * Menangkap query string ?user=Nama. Bila kosong, pakai nama default.
     */
    public function beranda(Request $request)
    {
        // request()->query('user') mengambil nilai ?user=..., default ke nama mahasiswa.
        $nama = $request->query('user', self::MAHASISWA['nama']);

        return view('beranda', [
            'nama' => $nama,
        ]);
    }

    /**
     * Halaman Profil (/profil-mahasiswa).
     * Mengirim data identitas untuk dirender oleh komponen <x-profile-card>.
     */
    public function profil()
    {
        return view('profil', [
            'mahasiswa' => self::MAHASISWA,
        ]);
    }

    /**
     * Halaman Ide Riset (/ide-agent).
     * Menangkap query string ?mode=dark untuk mengaktifkan tema gelap Bootstrap.
     */
    public function ideAgent(Request $request)
    {
        // Mode gelap aktif hanya jika ?mode=dark dikirim.
        $modeGelap = $request->query('mode') === 'dark';

        return view('ide-agent', [
            'modeGelap' => $modeGelap,
        ]);
    }
}

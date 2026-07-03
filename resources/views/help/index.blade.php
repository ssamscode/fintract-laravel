@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto space-y-8">

    {{-- Header --}}
    <div>

        <h1 class="text-3xl font-bold text-[#235347]">

            Bantuan

        </h1>

        <p class="text-gray-500 mt-2">

            Panduan penggunaan aplikasi FinTrack.

        </p>

    </div>

    {{-- Tentang --}}
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <h2 class="text-xl font-semibold mb-4">

            Tentang FinTrack

        </h2>

        <p class="text-gray-600 leading-8">

            FinTrack merupakan aplikasi manajemen keuangan yang membantu
            pengguna mencatat pemasukan, pengeluaran, melihat dashboard,
            menghasilkan laporan, serta mengekspor laporan ke PDF dan Excel.

        </p>

    </div>

    {{-- Fitur --}}
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <h2 class="text-xl font-semibold mb-5">

            Fitur Utama

        </h2>

        <ul class="space-y-3">

            <li>✅ Dashboard Keuangan</li>

            <li>✅ Manajemen Transaksi</li>

            <li>✅ Grafik Keuangan</li>

            <li>✅ Laporan Keuangan</li>

            <li>✅ Export PDF</li>


            <li>✅ Profil Pengguna</li>

        </ul>

    </div>

    {{-- Panduan --}}
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <h2 class="text-xl font-semibold mb-5">

            Panduan Penggunaan

        </h2>

        <ol class="list-decimal ml-6 space-y-3 text-gray-600">

            <li>Login ke aplikasi.</li>

            <li>Tambahkan transaksi melalui menu <strong>Transaksi</strong>.</li>

            <li>Lihat ringkasan pada Dashboard.</li>

            <li>Buka menu Laporan untuk melihat seluruh transaksi.</li>

            <li>Gunakan Export PDF atau Excel untuk mengunduh laporan.</li>

        </ol>

    </div>

    {{-- FAQ --}}
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <h2 class="text-xl font-semibold mb-5">

            FAQ

        </h2>

        <div class="space-y-5">

            <div>

                <h4 class="font-semibold">

                    Bagaimana menambah transaksi?

                </h4>

                <p class="text-gray-600">

                    Buka menu Transaksi kemudian klik "Tambah Transaksi".

                </p>

            </div>

            <div>

                <h4 class="font-semibold">

                    Bagaimana mengubah transaksi?

                </h4>

                <p class="text-gray-600">

                    Klik tombol Edit pada riwayat transaksi.

                </p>

            </div>

            <div>

                <h4 class="font-semibold">

                    Bagaimana menghapus transaksi?

                </h4>

                <p class="text-gray-600">

                    Klik tombol Hapus kemudian konfirmasi penghapusan.

                </p>

            </div>

        </div>

    </div>

</div>

@endsection
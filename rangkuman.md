# Rangkuman Proyek: Laravel Portfolio

Proyek ini adalah aplikasi portofolio yang dibangun menggunakan framework Laravel.

## Fitur Utama

1.  **Halaman Publik:**
    *   **Home:** Menampilkan informasi utama dan daftar proyek.
    *   **Contact:** Form kontak bagi pengunjung untuk mengirim pesan.
2.  **Dashboard Admin:**
    *   **Manajemen Proyek:** CRUD (Create, Read, Update, Delete) untuk proyek portofolio.
    *   **Manajemen Pesan:** Melihat dan menghapus pesan yang masuk melalui form kontak.
    *   **Autentikasi:** Login admin untuk mengakses dashboard.

## Struktur Database (Model)

*   **Project:** Menyimpan informasi proyek (judul, deskripsi, gambar, tag, dll).
*   **Contact:** Menyimpan pesan dari pengunjung (nama, email, subjek, pesan).
*   **User:** Model bawaan Laravel untuk autentikasi admin.

## Rute Utama (Routes)

*   `/`: Halaman Beranda (`PortfolioController@home`)
*   `/contact`: Halaman Kontak (`PortfolioController@contact`)
*   `/admin/login`: Login Admin
*   `/admin/projects`: Kelola Proyek
*   `/admin/messages`: Kelola Pesan

## Teknologi yang Digunakan

*   **Backend:** Laravel
*   **Frontend:** Blade Templates, CSS, JS
*   **Database:** (Sesuai konfigurasi `.env`, biasanya MySQL/SQLite)

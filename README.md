# GetSplit

GetSplit adalah aplikasi web berbasis **Laravel** yang digunakan untuk **mencatat, membagi, dan melacak pembayaran tagihan (split bill)** bersama teman atau kelompok.

Project ini dikembangkan sebagai bagian dari **Project & Manual Book Hak Kekayaan Intelektual (HKI)**.

---

## 🚀 Fitur Utama

* 🔐 **Autentikasi Pengguna** (Register, Login, Logout)
* 🏠 **Dashboard** ringkasan bill dan transaksi
* 🧾 **Manajemen Bill**

  * Membuat bill baru (tanggal, due date, nama bill, tipe bill)
  * Menambahkan item bill dalam bentuk list
  * Menambahkan pajak (tax) dan diskon (opsional)
* 👥 **Split Bill per Item**

  * Dapat memilih metode equal split atau custom split
  * Memilih multiple participant
  * Setiap participant memilih item yang dibeli
  * Perhitungan total dan ringkasan split otomatis
* 💸 **Tracking Pembayaran**

  * Status pembayaran tiap participant
* 👤 **Manajemen Profil Pengguna**

---

## 🛠️ Teknologi yang Digunakan

* **Backend** : Laravel
* **Frontend** : Blade HTML, Tailwind CSS
* **Database** : SQLite
* **Build Tool** : Vite
* **Version Control** : Git

---

## 📂 Struktur Project 

```
app/
 ├── Http/Controllers/
 ├── Models/
resources/
 ├── views/
 ├── css/
 ├── js/
routes/
 ├── web.php
database/
 ├── migrations/
 ├── seeders/
```

---

## ⚙️ Instalasi & Konfigurasi

### 1. Clone Repository

```bash
git clone <repository-url>
cd GetSplit
```

### 2. Install Dependency

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Migrasi Database

```bash
php artisan migrate
```

### 5. Build Asset

```bash
npm run dev
```

### 6. Jalankan Server

```bash
php artisan serve
```

Akses web melalui:

```
http://127.0.0.1:8000
```

---

## 🧠 Alur Penggunaan

1. User masuk ke Landing Page
2. User melakukan **registrasi / login**
3. Masuk ke **dashboard**
4. Membuat **bill baru**
5. Menambahkan **item bill**
6. Memilih **participant**
7. Participant memilih item masing-masing
8. Sistem menampilkan **total bill & split summary**
9. User melakukan **tracking pembayaran**

---

## 👨‍💻 Pengembang

* **Nama** : I Made Rovan Puja Wardana
* **Program Studi** : Informatika
* **Project** : Web Application

# Admin Page Tes

## Note: Untuk melihat konsep/ide awal masing masing halaman, bisa melihat folder bernama ide-awal dan buka index.html dengan browser.

## Application Flow

1. Pertama pengguna akan akses halaman login pertama (yang di set saat ini halaman auth) dimana user akan diminta login.

2. Kedua jika user belum buat akun, maka user bisa klik Create Account dan mendaftarkan diri dia sebagai user.

3. Ketiga ketika user berhasil mendaftar, user akan kembali ke halaman login lagi. User akan mengisi email dan password, backend memverifikasi data jika sukses akan membuat session

4. Keempat user sebagai admin akan melihat dashboard sebagai halaman utama, pada halaman ini user bisa melihat berapa surat yang sudah di approved, surat yang perlu di revisi, dan surat yang di declined.

5. Kelima user bisa klik button buat surat di pojok kanan, dan user bisa mengajukan form surat reimbursement sebagai form yang bisa diajukan serta detail yang bisa di input lebih detail

6. Keenam ketika user submit, user kembali ke dashboard. Ketika user selesai, user bisa logout di icon profile sebelah pojok kanan atas dan akan diredirect ke login.


## Hal yang perlu dikerjakan jika dikasih waktu lebih

1. Backend perlu dirapihkan dan dikerjakan dengan lebih baik, codeigniter juga perlu dipelajari lebih dalam khususnya bagian debugging karena saat ini backend SQL belum berfungsi walaupun data sudah bisa masuk.

2. Dashboard admin bisa dirapihkan lebih baik lagi dan bisa disesuaikan dengan isi surat juga namun saya memiliki ide jika perlu rapih, bisa buat halaman khusus untuk menunjukan detail surat dimana admin ataupun pegawai perusahaan lainnya bisa lihat detail surat lebih baik.

3. Jika saya ada waktu saya implementasikan user dimana masing masing user memiliki role berbeda beda (admin, supervisor, director, employee dan lain lain) dimana mereka bisa melakukan hal berbeda beda berdasarkan posisi mereka (dengan supervisor dan director yang bisa melakukan semuanya)
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

### Tentang Project

Ini adalah Project untuk memenuhi tugas test Technical, yang membahas website aplikasi untuk dapat memonitoring  kendaraan yang terdapat pada suatu perusahaan tambang nikel yang memiliki enam tambang yang berbeda. 

### Dasar Project

- Terdapat 2 User(ADMIN,APPROVER)
- Admin dapat menginput pemesanan  Kendaraan, Driver serta Approver
- 2 level persetujuan
- Dashboard Pemakaian Kendaraan
- Export Excel

### Tools
Web Design
- **[Mazer](https://github.com/zuramai/mazer)**
- **[Login_v3](https://colorlib.com/wp/template/login-form-v3/)**
- **[Bootstrap](https://getbootstrap.com/)**

Framework & tools
- **[PHP 8.0.11](https://www.php.net/)**
- **[Laravel 9.8.1](https://laravel.com/)**
- **[Laravel-excel^3.1](https://laravel-excel.com/)**
- **[phpspreadsheet^1.18](https://phpspreadsheet.readthedocs.io/en/latest/)**

Database 
- **SQL**

Account & Pass
1. Admin
- user-123
- admin-123

2. Approver
- tes-123
- sekawan-123
### Step By Step

1. Pertama kita git clone dahulu repo ke komputer kita masing - masing.

```
git clone https://github.com/Jordan-18/SkMedia-test-project.git
```

2. Jika Repo Sudah Clone maka buka Repo yang telah di clone dan jalankan **composer update**

```
composer update
```
langkah ini akan memakan sedikti waktu tergantung dari sinyal masing - masing.

3. Jika composer sudah terupdate maka, mari kita atur .env untuk menginisialisai databasenya
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
Jangan lupa buat juga database-nya didalam XAMPP
4. jika sudah mengatur database maka mari jalankan
```
php artisan serve
```
Pada tahap ini kita akan diberi akses link 
```
http://127.0.0.1:8000/
```
dan jika buka akan adanya error key binding, lalu ikuti saja arahan dari laravel untuk mendapatkan key nya

5. Tahap berikutnya kita lakukan migrasi dan juga seeder
```
php artisan migrate
```
```
php artisan db:seed
```
### Flow Program

#### **ERD**
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://i.postimg.cc/dVznQr8M/ERD-sekawan.png"></a></p>

#### **ADMIN**
- ADMIN mampu Membuat Pesanan Order Pemesanan.
- Setiap Data yang dinput Oleh Admin akan mendapat **Status** PENDING yang akan di ubah oleh APPROVER
- Jika semua persetujuan telah selesai maka selesai dan perpanjangan Penyewaan dilaksanakan oleh ADMIN
- Jika **Status** telah Berubah menjadi APPROVED 2 maka ditampilan ADMIN akan muncul Tombol DONE jika sekiranya Pesanan telah Selesai.

### **APPROVER**
- APPROVER bertugas untuk mnyetujui pemintaan peminjaman.
- **Status** memiliki beberapa tahapan antara lain :
    - PENDING     = status dari ADMIN
    - APPROVED 1  = status dari APPROVER
    - APPROVED 2  = status dari Driver
    - REJECT      = status dari APPROVER
    - DONE        = status dari ADMIN
- APPROVER juga bertugas untuk mengirimkan pesan melalui WA ke driver dengan menekan tombol biru setelah tombol approve di tekan

### **DRIVER**
- Jika APPROVER telah mengirim pesan ke Driver maka driver akan menerima sebuah link untuk menyetujui bahwasannya ia bersedia menjadi Driver Pada waktu yang telah ditentukan proses ini akan mengubah **Status** menjadi APPROVED 2
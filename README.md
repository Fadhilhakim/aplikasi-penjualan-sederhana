# Aplikasi Penjualan Sederhana

Project "aplikasi-penjualan-sederhana". System ini dirancang untuk mengelola produk, keranjang belanja, pesanan, dan riwayat pesanan untuk platform e-commerce.

---

## Quick Start :
> - jan lupa cofig env :}
> - sama jan lupa buat database baru : "aplikasi-penjualan-sederhana"
> - MySQL ver: 5.7.33

``` bash
composer install && composer update
cp .env.example .env
php artisan migrate
php artisan db:seed
php artisan key:generate
```
install & run npm :
``` bash
npm install && npm run dev
```
> selalu npm run dev setiap kali membuka project

## User Side App :
<a href="https://github.com/Fadhilhakim/aplikasi-penjualan-sederhana_userSide.git">https://github.com/Fadhilhakim/aplikasi-penjualan-sederhana_userSide.git<a>
> still in develop

## Tech Stack :
- Laravel 11
- Breeze
- TailwindCss 
- Alpine Js

## Preview :

![Login](https://github.com/user-attachments/assets/595a46fa-c47f-4543-9ab0-fd65b7ce147c)

![Dashboard](https://github.com/user-attachments/assets/27b07172-d541-4bcd-84b0-c7f90d92d81c)

![invoice Penjualan](https://github.com/user-attachments/assets/0e740508-6d45-4cda-8fa8-22b0975751d1)

![image](https://github.com/user-attachments/assets/eed16e6b-0020-4727-9e6e-40fcaff429aa)

![History](https://github.com/user-attachments/assets/56d488d2-de8a-4bf8-adc4-7a1742c0a752)


## Struktur Tabel

### 1. **Tabel products**

| Nama Kolom      | Tipe Data           |
|-----------------|---------------------|
| id              | BIGINT(20) UNSIGNED |
| name            | VARCHAR(100)        |
| price           | DECIMAL(10,2)       |
| stock           | INT(11)             |
| sold_out        | INT(11)             |
| image_path      | VARCHAR(255)        |
| discount        | ENUM('Y', 'N')      |
| discount_value  | DECIMAL(5,2)        |
| description     | TEXT                |
| created_at      | TIMESTAMP           |
| updated_at      | TIMESTAMP           |

### 2. **Tabel shopping_carts**

| Nama Kolom      | Tipe Data           |
|-----------------|---------------------|
| id              | BIGINT(20) UNSIGNED |
| user_id         | BIGINT(20) UNSIGNED |
| product_id      | BIGINT(20) UNSIGNED |
| quantity        | INT(11)             |
| created_at      | TIMESTAMP           |
| updated_at      | TIMESTAMP           |

Keterbatasan Kunci Asing:
- `product_id` merujuk ke `products(id)`.
- `user_id` merujuk ke `users(id)`.

### 3. **Tabel order_requests**

| Nama Kolom      | Tipe Data           |
|-----------------|---------------------|
| id              | BIGINT(20) UNSIGNED |
| user_id         | BIGINT(20) UNSIGNED |
| product_id      | BIGINT(20) UNSIGNED |
| quantity        | INT(11)             |
| payment         | VARCHAR(255)        |
| address         | VARCHAR(255)        |
| status          | ENUM('LUNAS', 'BELUM BAYAR', 'MENUNGGU KONFIRMASI', 'DITERIMA USER') |
| created_at      | TIMESTAMP           |
| updated_at      | TIMESTAMP           |

Keterbatasan Kunci Asing:
- `product_id` merujuk ke `products(id)`.
- `user_id` merujuk ke `users(id)`.

### 4. **Tabel order_history**

| Nama Kolom      | Tipe Data           |
|-----------------|---------------------|
| id              | BIGINT(20) UNSIGNED |
| user_name       | VARCHAR(255)        |
| user_email      | VARCHAR(255)        |
| order_date      | DATE                |
| total_quantity  | INT(11)             |
| total_price     | INT(11)             |
| status          | VARCHAR(255)        |
| payment         | VARCHAR(255)        |
| products_order  | JSON                |
| created_at      | TIMESTAMP           |
| updated_at      | TIMESTAMP           |

---

## Hubungan antar Tabel
- **products**: Setiap produk dapat menjadi bagian dari beberapa pesanan dan item keranjang belanja.
- **shopping_carts**: Setiap entri keranjang belanja menghubungkan pengguna dengan produk dan mencatat jumlah produk.
- **order_requests**: Setiap permintaan pesanan menghubungkan pengguna dengan produk, serta melacak status pembayaran dan pesanan.
- **order_history**: Tabel ini mencatat pesanan yang sudah selesai, menyimpan detail total pesanan, termasuk produk, jumlah, dan harga dalam format JSON.

---


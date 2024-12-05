# Aplikasi Penjualan Sederhana

## Quick Start :
> jan lupa cofig env :}
> sama jan lupa buat database baru : "aplikasi-penjualan-sederhana"
> MySQL ver: 5.7.33

``` bash
composer install && composer update
cp .env.example .env
php artisan migrate
php artisan key:generate
```
install & run npm :
``` bash
npm install && npm run dev
```
> selalu npm run dev setiap kali membuka project

## Struktur Tabel Database

### Tabel: `products`

| Nama Kolom   | Tipe Data       | Panjang/Batasan | Keterangan                      |
|--------------|-----------------|-----------------|----------------------------------|
| `id`         | BIGINT          | Primary Key     | ID unik untuk produk            |
| `name`       | VARCHAR(100)    | 100 karakter    | Nama produk                     |
| `price`      | DECIMAL(10, 2)  | 10 digit total  | Harga produk (2 digit desimal)  |
| `stock`      | INTEGER         | -               | Jumlah stok                     |
| `created_at` | TIMESTAMP       | -               | Waktu data dibuat               |
| `updated_at` | TIMESTAMP       | -               | Waktu data diperbarui           |


### Tabel: `sales`

| Nama Kolom   | Tipe Data       | Panjang/Batasan | Keterangan                                |
|--------------|-----------------|-----------------|------------------------------------------|
| `id`         | BIGINT          | Primary Key     | ID unik untuk transaksi penjualan         |
| `product_id` | BIGINT          | Foreign Key     | Referensi ke kolom `id` pada tabel `products` |
| `quantity`   | INTEGER         | -               | Jumlah produk yang terjual                |
| `created_at` | TIMESTAMP       | -               | Waktu data dibuat                         |
| `updated_at` | TIMESTAMP       | -               | Waktu data diperbarui                     |

> ### Relasi Antar Tabel
> - **Foreign Key:** `sales.product_id` → `products.id`
> - **Aksi Cascade:** Jika data di tabel `products` dihapus, maka data terkait di tabel `sales` juga akan dihapus.

## Tech Stack :
- Laravel 11
- TailwindCss 
- Alpine Js

## Preview :
  
![dashboard](https://github.com/user-attachments/assets/3532a054-1333-4626-a781-26a068ae71a4)
![Thumbnail 1](https://github.com/user-attachments/assets/b1b6659c-cce8-4b33-a921-4c08c5369e37)
![Thumbnail 2](https://github.com/user-attachments/assets/96bfc8d3-ec15-4b11-b3a8-c974fc718e68)
![Thumbnail 3](https://github.com/user-attachments/assets/471d39bb-eafc-4700-adcd-0319d53264ce)

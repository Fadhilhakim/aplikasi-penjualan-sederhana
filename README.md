# Aplikasi Penjualan Sederhana

## Quick Start :
> - jan lupa cofig env :}
> - sama jan lupa buat database baru : "aplikasi-penjualan-sederhana"
> - MySQL ver: 5.7.33

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

## Contoh Data Untuk Database :
- Tabel `product` :
  ``` sql
  INSERT INTO products (name, price, stock, created_at, updated_at) VALUES
    ('Apple iPhone 14', 999.99, 50, NOW(), NOW()),
    ('Samsung Galaxy S23', 799.99, 70, NOW(), NOW()),
    ('Sony WH-1000XM5 Headphones', 399.99, 30, NOW(), NOW()),
    ('Dell XPS 13 Laptop', 1199.99, 20, NOW(), NOW()),
    ('Nike Air Max 270', 150.00, 100, NOW(), NOW()),
    ('Adidas Ultraboost', 180.00, 90, NOW(), NOW()),
    ('Gucci GG Marmont Bag', 2500.00, 15, NOW(), NOW()),
    ('Rolex Submariner Watch', 8000.00, 10, NOW(), NOW()),
    ('Tesla Model 3', 35000.00, 5, NOW(), NOW()),
    ('Amazon Echo Dot', 49.99, 200, NOW(), NOW());
  ```
  
- Tabel `sales` :
  ``` sql
  INSERT INTO sales (product_id, quantity, created_at, updated_at) VALUES
    (1, 2, NOW(), NOW()), -- 2 unit Apple iPhone 14
    (2, 3, NOW(), NOW()), -- 3 unit Samsung Galaxy S23
    (3, 1, NOW(), NOW()), -- 1 unit Sony WH-1000XM5
    (4, 1, NOW(), NOW()), -- 1 unit Dell XPS 13
    (5, 5, NOW(), NOW()), -- 5 unit Nike Air Max 270
    (6, 4, NOW(), NOW()), -- 4 unit Adidas Ultraboost
    (7, 1, NOW(), NOW()), -- 1 unit Gucci GG Marmont Bag
    (8, 1, NOW(), NOW()), -- 1 unit Rolex Submariner Watch
    (9, 1, NOW(), NOW()), -- 1 unit Tesla Model 3
    (10, 10, NOW(), NOW()); -- 10 unit Amazon Echo Dot

  ```
---
## Tech Stack :
- Laravel 11
- Breeze
- TailwindCss 
- Alpine Js

## Preview :

![Login](https://github.com/user-attachments/assets/595a46fa-c47f-4543-9ab0-fd65b7ce147c)

![Dashboard](https://github.com/user-attachments/assets/e9d8591d-9e5b-46d3-8db1-4064af97b235)

![Penjualan](https://github.com/user-attachments/assets/f35eb948-58fb-46c0-94fb-631363da458a)

![Produk](https://github.com/user-attachments/assets/0f62cea4-12ec-45b3-9825-82948f8d94d9)

![Profile](https://github.com/user-attachments/assets/4f9c1c7d-9503-4512-b21d-9c1174086ec0)


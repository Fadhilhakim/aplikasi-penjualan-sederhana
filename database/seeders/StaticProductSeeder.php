<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class StaticProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'iPhone',
                'price' => 12000000,
                'stock' => 200,
                'image_path' => 'https://upload.wikimedia.org/wikipedia/en/e/ee/Front_%26_Back_Face_of_iPhone_16_Pro_Max.png',
                'discount' => 'N',
                'discount_value' => 0,
                'description' => 'The latest iPhone with advanced features.',
            ],
            [
                'name' => 'Drone DJI',
                'price' => 10000000,
                'stock' => 125,
                'image_path' => 'https://store.terra-drone.co.id/wp-content/uploads/2022/10/DJI-Mavic-3-gambar-utama.jpg',
                'discount' => 'N',
                'discount_value' => 0, 
                'description' => 'High-quality drone for capturing stunning aerial footage.',
            ],
            [
                'name' => 'Sony WH-1000XM5 Headphones',
                'price' => 4599000,
                'stock' => 600,
                'image_path' => 'https://www.sony.co.id/image/6145c1d32e6ac8e63a46c912dc33c5bb?fmt=pjpeg&wid=330&bgcolor=FFFFFF&bgc=FFFFFF',
                'discount' => 'Y',
                'discount_value' => 35,
                'description' => 'Noise-cancelling headphones for premium audio experience.',
            ],
            [
                'name' => 'Amazon Echo Dot',
                'price' => 650000,
                'stock' => 100,
                'image_path' => 'https://images.tokopedia.net/img/cache/700/OJWluG/2023/7/14/9a9d7eb8-901f-4395-92bf-a5f138a44f77.jpg?ect=4g',
                'discount' => 'N',
                'discount_value' => 0,
                'description' => 'Smart speaker with Alexa for hands-free convenience.',
            ],
            [
                'name' => 'Dell XPS 13 Laptop',
                'price' => 5900000,
                'stock' => 29,
                'image_path' => 'https://images.tokopedia.net/img/cache/500-square/hDjmkQ/2024/2/2/7ff73290-a1d1-4cef-b9f2-e18e462a04ef.jpg',
                'discount' => 'Y',
                'discount_value' => 35,
                'description' => 'Compact and powerful laptop for professionals.',
            ],
            [
                'name' => 'LEGACY 204 Lightweight Tripod Fluid Head for Camera Smartphone',
                'price' => 182000,
                'stock' => 20,
                'image_path' => 'https://static.wixstatic.com/media/2ed629_86e495e55f4f459c95875d68d05339f0~mv2.png/v1/fill/w_744,h_744,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/2ed629_86e495e55f4f459c95875d68d05339f0~mv2.png',
                'discount' => 'N',
                'discount_value' => 0, 
                'description' => 'Nikmati stabilitas dan fleksibilitas maksimal dengan LEGACY 204 Lightweight Tripod Fluid Head, solusi ideal untuk kebutuhan fotografi dan videografi Anda. Tripod ini dirancang untuk kamera dan smartphone, menghadirkan kombinasi sempurna antara portabilitas, keandalan, dan kemudahan penggunaan..',
            ],
            [
                'name' => 'Sony Alpha A7 Iii Kit 28-70mm Kamera Mirrorless',
                'price' => 14999000,
                'stock' => 40,
                'image_path' => 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//94/MTA-2041797/sony_sony-alpha-a7-iii-kit-28-70mm-kamera-mirrorless---black_full05.jpg',
                'discount' => 'N',
                'discount_value' => 0, 
                'description' => 'Spesifikasi:, Resolusi Sensor 24.2MP APS-C Exmor HD CMOS Sensor,',
            ],
            [
                'name' => 'Sony BURANO',
                'price' => 25000000,
                'stock' => 20,
                'image_path' => 'https://shootblue.tv/wp-content/uploads/2024/03/Sony-BURANO.png',
                'discount' => 'N',
                'discount_value' => 0, 
                'description' => 'Developed to compliment both the flagship Sony VENICE series and the popular Sony FX line of cameras, the BURANO is a high specification cinematography cameras which packs powerful imaging capability and functionality into a compact camera body.',
            ],
            [
                'name' => 'Sony WF-1000XM5 Truly Wireless Noise Canceling Earbuds (Black)',
                'price' => 5600000,
                'stock' => 20,
                'image_path' => 'https://www.focuscamera.com/media/catalog/product/2/3/234d364947cc58b6_1.jpeg?optimize=medium&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700',
                'discount' => 'Y',
                'discount_value' => 35, 
                'description' => 'The WF-1000XM5 features cutting-edge technology to deliver premium sound quality and the best truly wireless noise-canceling performance on the market. With a specially designed driver unit, for wide frequency production, deep bass, and clear vocals, these headphones are designed to immerse you in a sound so good, it feels like you’re in the studio with your favorite artists.',
            ],
            [
                'name' => 'Garmin epix Pro Gen 2 Sapphire Edition GPS 42mm Smartwatch (Carbon Gray Titanium with Black Band)',
                'price' => 14000000,
                'stock' => 20,
                'image_path' => 'https://www.focuscamera.com/media/catalog/product/3/5/350f9ed6afd9dd4c_1.jpeg?optimize=medium&bg-color=255,255,255&fit=bounds&height=320&width=320&canvas=320:320',
                'discount' => 'Y',
                'discount_value' => 35, 
                'description' => 'The Garmin epix Pro Sapphire Edition smartwatch is perfect for smaller wrists. This incredible smartwatch features an AMOLED display and promises superior battery performance. Indulge in your favorite activities every day as a single charge lasts for weeks in the smartwatch mode.',
            ],
            [
                'name' => 'Epson WorkForce ST-M3000 Monochrome MFP Supertank Printer',
                'price' => 8000000,
                'stock' => 50,
                'image_path' => 'https://www.focuscamera.com/media/catalog/product/9/5/95c95200fd29a39a.jpg?optimize=medium&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700',
                'discount' => 'N',
                'discount_value' => 0, 
                'description' => 'The compact Epson WorkForce ST-M3000 Monochrome MFP Supertank Printer delivers performance beyond laser. Specially designed for busy workgroups, it prints pro-quality black documents and helps you to save your printing cost by supporting dual sided printing. This multifunction printer handles multiple media such as print, copy, scan, and fax making it more efficient for workgroups.',
            ],
            [
                'name' => 'Samsung Home Theater System (HW-B750D)',
                'price' => 2300000,
                'stock' => 4,
                'image_path' => 'https://www.focuscamera.com/media/catalog/product/c/e/ce7c58d0f60af5a0.jpeg?optimize=medium&bg-color=255,255,255&fit=bounds&height=320&width=320&canvas=320:320',
                'discount' => 'N',
                'discount_value' => 0, 
                'description' => 'Key features: Dolby Digital 5.1 and DTS Virtual:X | 6 speakers | Built-in center and side speaker | Subwoofer with Bass Boost included | Adaptive sound',
            ],
            [
                'name' => 'Samsung Odyssey Ark 2nd Generation UHD 165Hz Quantum Mini-LED Curved 55-Inch Gaming Monitor (Black)',
                'price' => 26210000,
                'stock' => 6,
                'image_path' => 'https://www.focuscamera.com/media/catalog/product/2/e/2e24fb8ceb13f0c1_1.jpg?optimize=medium&bg-color=255,255,255&fit=bounds&height=320&width=320&canvas=320:320',
                'discount' => 'N',
                'discount_value' => 0, 
                'description' => 'Key features: 4-input Multi View | HDR 10 plus automatically adapts games in real-time | Features 4K UHD resolution | 165Hz and 1ms(GtG) response time | AMD FreeSync Premium Pro keeps the GPU and panel synced up',
            ],
            [
                'name' => 'DJI Avata 2 (Drone Only) with Weatherproof Hard Case with Customizable Foam Bundle',
                'price' => 40000000,
                'stock' => 4,
                'image_path' => 'https://www.focuscamera.com/media/catalog/product/5/c/5c3ae04811a00255.jpg?optimize=medium&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700',
                'discount' => 'N',
                'discount_value' => 0, 
                'description' => 'DJI Avata 2 provides an exhilarating FPV drone adventure, enhancing imaging, safety, and battery performance. Elevate the excitement by combining it with DJI Goggles 3 and DJI RC Motion 3. Opt for the standalone Avata 2 option, which includes the drone, an Intelligent Flight Battery, two pairs of extra propellers, and other accessories, offering a budget-friendly choice. Note that for full functionality, Goggles and RC Motion 3 are required (sold separately).',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

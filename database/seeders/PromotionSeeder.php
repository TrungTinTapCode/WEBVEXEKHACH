<?php

use Illuminate\Database\Seeder;
use App\Models\Promotion;

class PromotionSeeder extends Seeder
{
    public function run()
    {
        Promotion::insert([
            [
                'title' => 'Flash Sale đến 50%',
                'image_path' => 'img/flash-sale.jpg',
                'description' => 'Giảm giá sốc vào thứ 3 từ 12h - 14h',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'title' => 'Ưu đãi 25% Đà Lạt',
                'image_path' => 'img/dalat-deal.jpg',
                'description' => 'Vé xe Sài Gòn - Đà Lạt giảm 25%',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'title' => 'Deal nhà xe mới -15%',
                'image_path' => 'img/new-partner.jpg',
                'description' => 'Ưu đãi cho nhà xe mới mở bán trên hệ thống',
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);
    }
}

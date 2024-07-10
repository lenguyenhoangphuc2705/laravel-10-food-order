<?php

namespace Database\Seeders;

use App\Models\SectionTitle;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyChooseUsTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectionTitle::insert([
            [
                'key' => 'why_choose_top_title',
                'value' => 'Tại sao bạn nên chọn chúng tôi'
            ],
            [
                'key' => 'why_choose_main_title',
                'value' => 'Vì chúng tôi có'
            ],
            [
                'key' => 'why_choose_sub_title',
                'value' => 'Chúng tôi cam kết sử dụng nguyên liệu tươi ngon và chất lượng nhất để tạo ra những món ăn tinh tế và hấp dẫn. Đội ngũ đầu bếp tài hoa của chúng tôi luôn tìm kiếm và chọn lọc các nguyên liệu tốt nhất, đảm bảo mỗi món ăn đều đạt tiêu chuẩn cao nhất.'
            ]
        ]);
    }
}

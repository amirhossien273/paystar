<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Repository\Products\ProductsRepository; 
use App\Models\Product; 

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsRepository = new ProductsRepository(new Product);
        $productsRepository->create([
            'img' => 'https://dkstatics-public.digikala.com/digikala-products/26b4094098c446f2b8f5a99c10bd259c60a57269_1638954999.jpg?x-oss-process=image/resize,m_lfit,h_800,w_800/quality,q_90',
            'title' => 'تی شرت مردانه متفرقه',
            'discription' => 'تی شرت آستین بلند مردانه مدل آدیداس کد B29 رنگ سفید',
            'price' => 500,
        ]);

        $productsRepository->create([
            'img' => 'https://dkstatics-public.digikala.com/digikala-products/26b4094098c446f2b8f5a99c10bd259c60a57269_1638954999.jpg?x-oss-process=image/resize,m_lfit,h_800,w_800/quality,q_90',
            'title' => 'تی شرت زنانه متفرقه',
            'discription' => 'تی شرت آستین بلند زنانه مدل آدیداس کد  رنگ سفید',
            'price' => 500,
        ]);
    }
}

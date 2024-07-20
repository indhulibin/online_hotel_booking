<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'about_heading'=>'About',
            'about_content'=>'HJ',
            'about_status'=>1,
            'terms_heading'=>'JHBJ',
            'terms_content'=>'GVH',
            'terms_status'=>1,
            'privacy_heading'=>'indhu@gmail.com',
            'privacy_content'=> 'HB',
            'privacy_status'=>1,
            'contact_heading'=>'VGV',
            'contact_map'=>'HHG',
            'contact_status'=>1,
            'photo_gallery_heading'=> 'HJ',
            'photo_gallery_status'=>1,
            'video_gallery_heading'=>'HGH',
            'video_gallery_status'=>1,
            'faq_heading'=>'indhu@gmail.com',
            'faq_status'=> 1,
            'blog_heading'=>'admin.jpg',
            'blog_status'=>1,
            'cart_heading'=>'indhu',
            'cart_status'=>1,
            'checkout_heading'=> 'NJN',
            'checkout_status'=>1,
            'payment_heading'=>'HH',
            'signup_heading'=>'indhu',
            'signup_status'=>1,
            'signin_heading'=> 'HJB',
            'signin_status'=>1,
            'room_heading'=>'GHVH',
        ]);
    }
}

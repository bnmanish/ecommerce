<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class WebsettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('webiste_settings')->insert([
            'facebook' => 'https://www.facebook.com/bnmanish95/',
            'instagram' => 'https://www.instagram.com/itsbnmanish/',
            'twitter' => 'https://twitter.com/itsbnmanish',
            'gplus' => '',
            'linkedin' => 'https://www.linkedin.com/in/b-n-manish-a14780135/',
            'youtube' => 'https://www.youtube.com/channel/UCBMvmNb9aHlYx0AzyXpFDWw',
            'site_title' => 'B N Manish',
            'head_content' => 'Enter your head content here',
            'logo' => 'Please upload a logo',
            'favicon' => 'Please upload a favicon',
            'email1' => 'bnmanish006@gmail.com',
            'email2' => 'itsbnmanish@gmail.com',
            'contact1' => '8116648011',
            'contact2' => '8116648011',
            'address' => 'New Delhi,Delhi,India - 59',
            'footer_text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'copyright' => 'copyright © B N Manish 2021. All right reserved.',
        ]);
    }
}

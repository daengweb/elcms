<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Setting;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'	=> 'anugrah sandi',
        	'email'	=> 'makassarnetwork05@gmail.com',
        	'password'	=> bcrypt('anugrahsandicC1!ytrewq@')
        ]);

        Setting::create([
            'site_title'    => 'elCMS',
            'tagline'   => 'CMS Sederhana Dengan Laravel',
            'email' => 'admin@elcms.com',
            'blog_show_item'    => 5
        ]);
    }
}

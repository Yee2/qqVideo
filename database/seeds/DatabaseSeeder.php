<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SpVideoType::insert([
            [
                'name' => '电影',
            ],
            [
                'name' => '电视剧',
            ],
            [
                'name' => '动漫',
            ],
        ]);
        \App\Models\User::create([
            'name' => 'admin',
            'email' => '1770963469@qq.com',
            'password' => password_hash('123456', PASSWORD_DEFAULT)
        ]);
    }
}

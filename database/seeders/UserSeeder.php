<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'email' => 'lxc150896@gmail.com',
                'name' => 'lxc150896',
                'password' => bcrypt('12345'),
            ],
            [
                'email' => 'lxc@gmail.com',
                'name' => 'lxc',
                'password' => bcrypt('12345'),
            ],
            [
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'password' => bcrypt('12345'),
            ],
        ];
        DB::table('users')->insert($data);
    }
}

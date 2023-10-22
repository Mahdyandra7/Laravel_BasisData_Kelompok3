<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('123'),
                'nim' => '1600',
                'nama' => 'User Admin',
                'email' => 'user1@example.com',
                'no_telp' => '0821',
                'id_role' => 1,
            ],
            [
                'username' => 'head1',
                'password' => Hash::make('123'),
                'nim' => '1621',
                'nama' => 'User Head',
                'email' => 'head1@example.com',
                'no_telp' => '0852',
                'id_role' => 2,
            ],
            [
                'username' => 'staff1',
                'password' => Hash::make('123'),
                'nim' => '1622',
                'nama' => 'User Staff',
                'email' => 'staff1@example.com',
                'no_telp' => '0853',
                'id_role' => 3,
            ],
            // Tambahkan data pengguna lain jika diperlukan
        ]);
    }
}

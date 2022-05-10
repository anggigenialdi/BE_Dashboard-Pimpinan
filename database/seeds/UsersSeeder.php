<?php

use App\Models\AppUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AppUser::truncate();
        AppUser::insert([
            [
                'nama' => 'Administrator Diskominfo Demo',
                'email' => 'admindiskominfo.demo@bandung.go.id',
                'id_role' => '1',
                'password' => Hash::make('12345678'),
            ],
            [
                'nama' => 'Kepala Dinas Demo',
                'email' => 'kepaladinas.demo@bandung.go.id',
                'id_role' => '2',
                'password' => Hash::make('12345678'),
            ]
        ]);

    }
}

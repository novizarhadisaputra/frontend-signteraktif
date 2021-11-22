<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name' => 'Novizar Hadi Saputra',
            'email' => 'novizarhadisaputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 1,
            'is_active' => 1
        ]);

        $superadmin->detail()->create([
            'title' => 'Mr',
            'phone' => '+6285888426559',
            'sex' => 1,
            'province' => 'Jakarta',
            'city' => 'Jakarta Selatan',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $admin = User::create([
            'name' => 'Novizar H S',
            'email' => 'novizar.hadi.saputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 2,
            'is_active' => 1
        ]);

        $admin->detail()->create([
            'title' => 'Mr',
            'phone' => '+6285888426557',
            'sex' => 1,
            'province' => 'Jakarta',
            'city' => 'Jakarta Selatan',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $penerjemah = User::create([
            'name' => 'Firda',
            'email' => 'n.ovizarhadisaputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 3,
            'agency_id' => 1,
            'is_active' => 1
        ]);

        $penerjemah->detail()->create([
            'title' => 'Miss',
            'phone' => '+6281804741998',
            'sex' => 0,
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $penerjemah = User::create([
            'name' => 'Sari',
            'email' => 'no.vizarhadisaputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 3,
            'agency_id' => 1,
            'is_active' => 1
        ]);

        $penerjemah->detail()->create([
            'title' => 'Miss',
            'phone' => '+6289632646360',
            'sex' => 0,
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $penerjemah = User::create([
            'name' => 'Fathur',
            'email' => 'nov.izarhadisaputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 3,
            'agency_id' => 2,
            'is_active' => 1
        ]);

        $penerjemah->detail()->create([
            'title' => 'Mr',
            'phone' => '+6289632646360',
            'sex' => 1,
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $penerjemah = User::create([
            'name' => 'Eka',
            'email' => 'novi.zarhadisaputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 3,
            'agency_id' => 2,
            'is_active' => 1
        ]);

        $penerjemah->detail()->create([
            'title' => 'Mr',
            'phone' => '+6285718954343',
            'sex' => 0,
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $penerjemah = User::create([
            'name' => 'Nels',
            'email' => 'noviz.arhadisaputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 3,
            'agency_id' => 1,
            'is_active' => 1
        ]);

        $penerjemah->detail()->create([
            'title' => 'Mr',
            'phone' => '+6285741417828',
            'sex' => 0,
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $penerjemah = User::create([
            'name' => 'Nels',
            'email' => 'noviza.rhadisaputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 3,
            'agency_id' => 1,
            'is_active' => 1
        ]);

        $penerjemah->detail()->create([
            'title' => 'Miss',
            'phone' => '+6285741417828',
            'sex' => 0,
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $penerjemah = User::create([
            'name' => 'Randi',
            'email' => 'novizar.hadisaputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 3,
            'agency_id' => 1,
            'is_active' => 1
        ]);

        $penerjemah->detail()->create([
            'title' => 'Mr',
            'phone' => '+6289680804787',
            'sex' => 1,
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $penerjemah = User::create([
            'name' => 'Rezzy',
            'email' => 'novizarh.adisaputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 3,
            'agency_id' => 1,
            'is_active' => 1
        ]);

        $penerjemah->detail()->create([
            'title' => 'Mr',
            'phone' => '+628135974949',
            'sex' => 1,
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $penerjemah = User::create([
            'name' => 'Atta',
            'email' => 'novizarha.disaputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 3,
            'agency_id' => 1,
            'is_active' => 1
        ]);

        $penerjemah->detail()->create([
            'title' => 'Mr',
            'phone' => '+628562508429',
            'sex' => 1,
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $penerjemah = User::create([
            'name' => 'Dina',
            'email' => 'novizarhad.isaputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 3,
            'agency_id' => 1,
            'is_active' => 1
        ]);

        $penerjemah->detail()->create([
            'title' => 'Miss',
            'phone' => '+62877706774296',
            'sex' => 0,
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $penerjemah = User::create([
            'name' => 'Adit',
            'email' => 'novizarhadi.saputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 3,
            'agency_id' => 1,
            'is_active' => 1
        ]);

        $penerjemah->detail()->create([
            'title' => 'Mr',
            'phone' => '+6281226606610',
            'sex' => 1,
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $penerjemah = User::create([
            'name' => 'Muiz',
            'email' => 'novizarhadis.aputra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 3,
            'agency_id' => 3,
            'is_active' => 1
        ]);

        $penerjemah->detail()->create([
            'title' => 'Mr',
            'phone' => '+6281226606610',
            'sex' => 1,
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $penerjemah = User::create([
            'name' => 'Hanifah',
            'email' => 'novizarhadisa.putra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 3,
            'agency_id' => 1,
            'is_active' => 1
        ]);

        $penerjemah->detail()->create([
            'title' => 'Mr',
            'phone' => '+6281288147986',
            'sex' => 1,
            'province' => 'Yogyakarta',
            'city' => 'Bantul',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);

        $pengguna = User::create([
            'name' => 'Novizar Hadi S',
            'email' => 'novizarhadisap.utra@gmail.com',
            'password' => 'Nn122012!!',
            'password_user' => 'Nn122012!!',
            'role_id' => 4,
            'is_active' => 1
        ]);



        $pengguna->detail()->create([
            'title' => 'Mr',
            'phone' => '+6285888426552',
            'sex' => 1,
            'province' => 'Jakarta',
            'city' => 'Jakarta Selatan',
            'has_whatsapp' => 1,
            'has_telegram' => 1
        ]);
    }
}

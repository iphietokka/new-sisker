<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $employee = new User();
        $employee->name = 'Administrator';
        $employee->username = 'admin';
        $employee->active = 1;
        $employee->role_id = 1;
        $employee->telepon = 01212121212;
        $employee->institusi = 'universitas';
        $employee->email_institusi = 'mail@mail.com';
        $employee->telp_institusi = 987986789689;
        $employee->provinsi = 'jawa barat';
        $employee->kota = 'bandung';
        $employee->alamat = 'jalan jalan';
        $employee->email = 'test@test.com';
        $employee->password = bcrypt('123456');
        $employee->save();


        $manager = new User();
        $manager->name = 'Muhammad Iradat ';
        $manager->username = 'user1';
        $manager->active = 1;
        $manager->role_id = 2;
        $manager->telepon = 121212;
        $manager->institusi = 'universitas';
        $manager->email_institusi = 'mail@universitas.com';
        $manager->telp_institusi = 987986789689;
        $manager->provinsi = 'jawa barat';
        $manager->kota = 'bandung';
        $manager->alamat = 'jalan jalan';
        $manager->email = 'test@iradat.com';
        $manager->password = bcrypt('123456');
        $manager->save();

        $manager = new User();
        $manager->name = 'Muhammad Abdul Iradat';
        $manager->username = 'bekaskaki';
        $manager->active = 1;
        $manager->role_id = 2;
        $manager->telepon = 12313123123123312;
        $manager->institusi = 'Bekaskaki.corp';
        $manager->email_institusi = 'bekaskaki@mail.com';
        $manager->telp_institusi = 987986789689;
        $manager->provinsi = 'jawa barat';
        $manager->kota = 'bandung';
        $manager->alamat = 'Jalan Cik Ditiro no.24/30';
        $manager->email = 'test@mail.com';
        $manager->password = bcrypt('123456');
        $manager->save();
    }
}

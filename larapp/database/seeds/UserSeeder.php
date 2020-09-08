<?php

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
        DB::table('users')->insert([
            'fullname' => 'Jeison Blandon',
            'email'    => 'jeisonbladovel@gmail.com',
            'phone'    => 3016084121,
            'birthdate'=> '1970-09-29',
            'gender'   => 'M',
            'address'  => 'Av 30 de agosto 40-40',
            'password' => bcrypt('admin'),
            'role'     => 'Admin',
            'created_at'=> now()

        ]);
        //
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;

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

        $usr = new User;
            $usr -> fullname    = 'Alexis Blandon';
            $usr -> email        = 'Alexisbladovel@hotmail.com';
            $usr -> phone       = 3107894545;
            $usr -> birthdate   = '1990-09-30';
            $usr -> gender      = 'M';
            $usr -> address     = 'km 5 via neira';
            $usr -> password    = bcrypt('customer');
            $usr -> created_at  = now();
            $usr -> save();


        
        //
    }
}

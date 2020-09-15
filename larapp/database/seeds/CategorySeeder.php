<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'xbox serie x',
            'description'    => 'ultima tecnologia',
            'created_at'=> now()

        ]);

        $ctg = new Category;
            $ctg -> name    = 'Play Station 5';
            $ctg -> description = 'Consola de ultima generacion de PS';
            $ctg -> save();

    }
}

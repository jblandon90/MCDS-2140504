<?php

use Illuminate\Database\Seeder;
use App\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'name'     => 'Gears of war',
            'description'    => 'juego de xbox 360 y serie x',
            'user_id'    => 1,
            'category_id'=> 1,
            'price'  => 70,
            'created_at'=> now()

        ]);
        
        
            $game = new Game;
            $game->name = 'Mortal kombat';
            $game->description = 'Juego de play station todas las generaciones';
            $game->user_id = 1;
            $game->category_id = 2;
            $game->price = 75;
            $game->save();





       
    }
}

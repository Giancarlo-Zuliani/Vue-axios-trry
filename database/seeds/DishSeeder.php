<?php

use Illuminate\Database\Seeder;
use App\Dish;
use App\User;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Dish::class, 150)
            ->make()
            ->each(function($dish){
                $user = User::inRandomOrder() -> first();
                $dish -> user() -> associate($user);
                $dish -> save();
            });
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Dish;
use App\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 10)
           ->make()
           ->each(function($ord){
               $user = User::inRandomOrder() -> first();
               $ord -> user() -> associate($user);
               $ord -> save();
               $dish = Dish::inRandomOrder() -> limit(rand(1,5))->get();
               $ord -> dishes()-> attach($dish);
               $ran = rand(1,3);
               $y = $ord -> id;
                 DB::update('update dish_order set dish_quantity ='. $ran . ' where order_id =' . $y);
            }); 

            
            
    }  
}

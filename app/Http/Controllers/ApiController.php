<?php

namespace App\Http\Controllers;
use App\User;
use App\Dish;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function randomRestaurant(){
        $restaurant = User::inRandomOrder() -> limit(8) ->get();
        return response() -> json([$restaurant]);
    }
    public function restaurant($id){
        $rest = User::findOrFail($id);
        $dishes = Dish::firstOrFail() -> where('user_id' , $id)-> get();
        return response() -> json([$rest,$dishes]);
    }
}

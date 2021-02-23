<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('typology_user' , function(Blueprint $table){
            $table->foreign('user_id' , 'ut-users')
            ->references('id')
            ->on('users');
            $table->foreign('typology_id' , 'ut-typology')
            ->references('id')
            ->on('typologies');
    });
    
    Schema::table('dish_order' , function(Blueprint $table){
        $table->foreign('dish_id' , 'do-dish')
        ->references('id')
        ->on('dishes');
        $table->foreign('order_id' , 'do-order')
        ->references('id')
        ->on('orders');
    });    
   
    Schema::table('orders' , function(Blueprint $table){
        $table->foreign('user_id' , 'user-order')
        ->references('id')
        ->on('users');
    });

    Schema::table('dishes' , function(Blueprint $table){
        $table->foreign('user_id' , 'user-dish')
        ->references('id')
        ->on('users');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dishes' , function (Blueprint $table){
            $table -> dropForeign('user-dish');
        });

        Schema::table('orders' , function (Blueprint $table){
            $table -> dropForeign('user-order');
        });

        Schema::table('dish_order' , function (Blueprint $table){
            $table->dropForeign('do-dish');
            $table->dropForeign('do-order');
        });        
        Schema::table('typology_user' , function (Blueprint $table){
            $table->dropForeign('ut-typology');
            $table->dropForeign('ut-users');
        });
    }
}

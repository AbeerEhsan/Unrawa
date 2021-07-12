<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
            $table->integer('cart_note');
            $table->string('day');
            $table->string('date');
            $table->string('time');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('to')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        
        Schema::create('category_transfer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('transfer_id')->unsigned();
            $table->timestamps();
            $table->unique(['category_id','transfer_id']);
         
            $table->softDeletes();
        
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); 
            $table->foreign('transfer_id')->references('id')->on('transfers')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
}

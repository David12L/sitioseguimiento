<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantedetalles', function (Blueprint $table) {
                $table->id();                //PK
                $table->integer('praMod1');  //0-4
                $table->integer('praMod2');  //0-4
                $table->integer('praMod3');  //0-4
                $table->integer('udMod1');   //Entero
                $table->integer('udMod2');   //Entero
                $table->integer('udMod3');   //Entero
                $table->integer('cerIdi');   //0-4
                $table->integer('modTit');   //0-3
                $table->date('fecDet');      //date
                $table->integer('estDet');   //0-1
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantedetalles');
    }
};

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
        Schema::create('user_houses', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column:'category_id')->nullable();
            $table->foreignId(column:'user_id')->nullable();             
            $table->string(column:'title');
            $table->string(column:'keywords')->nullable();
            $table->string(column:'description')->nullable();
            $table->string(column:'image')->nullable();
            $table->text(column:'detail')->nullable();
            $table->bigInteger(column:'price')->nullable();
            $table->integer(column:'metre')->nullable();
            $table->integer(column:'numberofrooms')->nullable();
            $table->integer(column:'buildingage')->nullable();
            $table->integer(column:'floorlocation')->nullable();
            $table->integer(column:'numberoffloors')->nullable();
            $table->string(column:'warmuptype')->nullable();
            $table->integer(column:'numberofbathrooms')->nullable();
            $table->string(column:'balcony')->nullable();
            $table->string(column:'furnished')->nullable();
            $table->string(column:'usingstatus')->nullable();
            $table->integer(column:'dues')->nullable();
            $table->string(column:'swap')->nullable();
            $table->string(column:'propertytype')->nullable();
            $table->string(column:'location')->nullable();
            $table->string(column:'status', length:6)->default('False');
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
        Schema::dropIfExists('user_houses');
    }
};

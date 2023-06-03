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
        Schema::create('comments', function (Blueprint $table) {
            $table->integer(column:'user_id');
            $table->integer(column:'house_id');
            $table->string(column:'subject', length: 100);
            $table->string(column:'review')->nullable();
            $table->string(column:'IP', length: 20 )->nullable();
            $table->integer(column:'rate')->default('0');
            $table->string(column:'status', length: 5 )->default('New');
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
        Schema::dropIfExists('comments');
    }
};

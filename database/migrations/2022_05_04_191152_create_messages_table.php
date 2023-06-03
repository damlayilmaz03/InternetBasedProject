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
        Schema::create('messages', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string(column:'name', length: 50);
            $table->string(column: 'email',length: 50)->nullable();
            $table->string(column:'phone',length: 20)->nullable();
            $table->string(column:'subject',length: 100)->nullable();
            $table->string(column:'message')->nullable();
            $table->string(column:'note',length: 100)->nullable();
            $table->string(column:'ip',length: 50)->nullable();
            $table->string(column:'status',length: 5)->nullable()->default('New');
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
        Schema::dropIfExists('messages');
    }
};

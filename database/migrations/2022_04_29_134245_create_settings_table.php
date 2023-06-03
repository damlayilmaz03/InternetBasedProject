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
        Schema::create('settings', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string(column:'title',length: 150);
            $table->string(column:'keywords')->nullable();
            $table->string(column:'description')->nullable();
            $table->string(column:'company',length: 150)->nullable();
            $table->string(column:'address',length: 150)->nullable();
            $table->string(column:'phone',length: 20)->nullable();
            $table->string(column:'fax',length: 20)->nullable();
            $table->string(column:'email',length: 75)->nullable(); 
            $table->string(column:'smtpserver',length: 75)->nullable();
            $table->string(column:'smtpemail',length: 75)->nullable();
            $table->string(column:'smtppassword',length: 15)->nullable();
            $table->integer(column:'smtpport')->nullable()->default(0);
            $table->string(column:'facebook',length: 100)->nullable();
            $table->string(column:'instagram',length: 100)->nullable();
            $table->string(column:'twitter',length: 100)->nullable();
            $table->string(column:'youtube',length: 100)->nullable();
            $table->text(column:'aboutus')->nullable();
            $table->text(column:'contact')->nullable();
            $table->text(column:'references')->nullable();
            $table->string(column:'icon',length: 50)->nullable();
            $table->string(column:'status',length: 5)->nullable()->default(false);
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
        Schema::dropIfExists('settings');
    }
};

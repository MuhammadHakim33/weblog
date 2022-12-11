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
        Schema::create('tbl_operators', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['administrator', 'author']);
            $table->string('contact')->nullable();
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
        Schema::dropIfExists('operators');
    }
};

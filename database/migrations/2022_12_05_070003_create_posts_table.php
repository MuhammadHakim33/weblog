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
        Schema::create('tbl_posts', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUuid('creator_id')
                  ->constrained('tbl_operators');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('thumbnail');
            $table->text('body');
            $table->foreignId('category_id')
                  ->constrained('tbl_categories')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            $table->enum('status', [
                'reviewed',
                'published',
                'rejected',
                'draf'
            ])->default('draf');
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
        Schema::dropIfExists('posts');
    }
};

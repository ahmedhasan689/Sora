<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('cookie_id');

            // ForeignId For Image
            $table->foreignId('post_id')->constrained('posts', 'id')->nullOnDelete();
            // ForeignId For User
            $table->foreignId('user_id')->nullable()->constrained('users', 'id')->cascadeOnDelete();

            $table->unsignedSmallInteger('quantity')->default(1);
            $table->timestamps();

            $table->unique(['cookie_id', 'image_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_path');
            $table->text('description')->nullable();
            $table->integer('likes')->default(0);

            // ForeignId For User & Category
            $table->foreignId('user_id')->constrained('users')->nullOnDelete(); 
            $table->foreignId('category_id')->default(1)->constrained('categories')->nullOnDelete(); 

            // Created_at & Updated_at
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
        Schema::dropIfExists('images');
    }
}

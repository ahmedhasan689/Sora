<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');

            // Foreign Keys
                // For User Table
            $table->foreignId('user_id')->constrained('users', 'id')->nullOnDelete();
                // For Post Table
            $table->foreignId('post_id')->constrained('posts', 'id')->nullOnDelete();
                // For Comment Itself
            $table->foreignId('comment_id')->nullable()->constrained('comments', 'id')->nullOnDelete();

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
}

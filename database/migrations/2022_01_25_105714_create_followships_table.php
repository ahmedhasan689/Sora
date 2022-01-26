<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followships', function (Blueprint $table) {
            $table->id();
            // Foreign Keys
            $table->foreignId('user_id')->constrained('users', 'id')->nullOnDelete();   // Will be following by follow_id
            $table->foreignId('follow_id')->constrained('users', 'id')->nullOnDelete(); // Will Follow User_id
            
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
        Schema::dropIfExists('followships');
    }
}

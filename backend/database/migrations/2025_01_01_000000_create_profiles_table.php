<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration {
    public function up(){
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('password_hash')->nullable();
            $table->json('settings')->nullable();
            $table->timestamps();
        });
    }
    public function down(){ Schema::dropIfExists('profiles'); }
}
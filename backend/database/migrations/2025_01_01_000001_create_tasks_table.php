<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration {
    public function up(){
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('notes')->nullable();
            $table->string('category')->default('Autre');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('repeat')->nullable();
            $table->tinyInteger('priority')->default(1);
            $table->boolean('completed')->default(false);
            $table->json('tags')->nullable();
            $table->timestamps();
        });
    }
    public function down(){ Schema::dropIfExists('tasks'); }
}
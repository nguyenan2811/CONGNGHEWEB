<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            if (!Schema::hasTable('students')) { // Kiểm tra bảng trước khi tạo
                $table->id();
                $table->string('first_name', 50);
                $table->string('last_name', 50);
                $table->date('date_of_birth');
                $table->string('parent_phone', 20)->nullable();
                $table->unsignedBigInteger('class_id');
                $table->timestamps();
        
                $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

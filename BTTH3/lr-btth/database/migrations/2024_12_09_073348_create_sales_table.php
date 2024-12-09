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
        
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id'); // Mã giao dịch
            $table->unsignedBigInteger('medicine_id'); // Mã thuốc (FK)
            $table->integer('quantity'); // Số lượng bán
            $table->dateTime('sale_date'); // Ngày bán
            $table->string('customer_phone', 10)->nullable(); // SĐT khách hàng
            $table->timestamps(); // Ngày tạo và cập nhật
    
            // Khóa ngoại
            $table->foreign('medicine_id')->references('medicine_id')->on('medicines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};

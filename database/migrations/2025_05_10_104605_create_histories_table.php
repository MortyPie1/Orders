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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->enum('status',['pending','delivered','failed'])->default('pending'); // pending, delivered, failed
            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('driver_id')->nullable()->constrained('drivers');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};

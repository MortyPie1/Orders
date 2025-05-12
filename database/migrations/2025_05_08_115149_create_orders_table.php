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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('drivers');
            $table->enum('type',['normal','urgent'])->default('normal'); //normal, urgent
            $table->enum('status',['delivered','failed'])->default('delivered'); // delivered, failed
            $table->date('delivery_date')->nullable();
            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('user_id')->constrained('users');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

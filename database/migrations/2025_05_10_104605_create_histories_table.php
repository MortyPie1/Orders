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
            $table->string('order_name');
            $table->enum('type',['normal','urgent'])->default('normal'); //normal, urgent
            $table->enum('status',['delivered','failed'])->default('delivered'); // delivered, failed
            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('driver_id')->constrained('drivers');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamp('delivery_date');
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

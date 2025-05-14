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
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('price');
            $table->integer('height');
            $table->integer('width');
            $table->enum('type',['normal','urgent'])->default('normal'); //normal, urgent
            $table->enum('status',['pending','delivered','failed'])->default('delivered'); // delivered, failed
            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('driver_id')->nullable()->constrained('drivers');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('no_telpon')->nullable();
            $table->string('snap_token')->nullable();
            $table->enum('status', ['pending', 'settlement', 'expire'])->default('pending');
            $table->string('jumlah')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};

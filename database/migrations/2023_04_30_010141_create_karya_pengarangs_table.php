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
        Schema::create('karya_pengarang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karya_id')->constrained('nama', 'id');
            $table->string('nama', 100);
            $table->string('karyaPengarang', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karya_pengarang');
    }
};

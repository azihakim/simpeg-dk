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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('nama');
            $table->unsignedBigInteger('divisi_id')->nullable();
            $table->foreign('divisi_id')->references('id')->on('jabatans');
            $table->string('status')->nullable();
            $table->string('status_kerja')->nullable();
            $table->string('nik')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('umur')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};

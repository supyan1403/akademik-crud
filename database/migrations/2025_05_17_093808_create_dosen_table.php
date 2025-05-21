<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('dosen', function (Blueprint $table) {
        $table->id();  // ID kolom dengan auto increment
        $table->string('nama_dosen');  // Nama dosen
        $table->timestamps();  
    });
}

public function down()
{
    Schema::dropIfExists('dosen');
}

};

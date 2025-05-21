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
    Schema::table('mahasiswa', function (Blueprint $table) {
       
        $table->bigInteger('matakuliah_id')->nullable()->change();
    });
}

public function down()
{
    Schema::table('mahasiswa', function (Blueprint $table) {
        // Jika rollback, ubah matakuliah_id kembali ke not nullable
        $table->bigInteger('matakuliah_id')->nullable(false)->change();
    });
}

};

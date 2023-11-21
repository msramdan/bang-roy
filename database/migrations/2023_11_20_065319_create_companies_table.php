<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan', 150);
			$table->string('telepon', 15);
			$table->string('alamat');
			$table->string('email')->unique();
			$table->string('akte_notaris', 150);
			$table->string('kep_men_kum_ham', 150);
			$table->string('npwp', 150);
			$table->string('nib', 150);
			$table->string('sppkp', 150);
			$table->string('logo')->nullable();
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};

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
        Schema::create('instances', function (Blueprint $table) {
            $table->id();
            $table->integer('app_id');
			$table->string('app_name', 200);
			$table->string('push_url', 200);
			$table->string('instance_name', 200);
			$table->text('address');
			$table->foreignId('provinsi_id')->nullable()->constrained('provinces')->restrictOnUpdate()->nullOnDelete();
			$table->foreignId('kabkot_id')->nullable()->constrained('kabkots')->restrictOnUpdate()->nullOnDelete();
			$table->foreignId('kecamatan_id')->nullable()->constrained('kecamatans')->restrictOnUpdate()->nullOnDelete();
			$table->foreignId('kelurahan_id')->nullable()->constrained('kelurahans')->restrictOnUpdate()->nullOnDelete();
			$table->string('zip_kode', 20);
			$table->string('email', 100);
			$table->string('phone', 13);
			$table->string('longitude', 200);
			$table->string('latitude', 200);
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
        Schema::dropIfExists('instances');
    }
};

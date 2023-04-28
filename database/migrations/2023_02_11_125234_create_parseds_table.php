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
        Schema::create('parseds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->nullable()->constrained('devices')->nullOnDelete();
            $table->foreignId('rawdata_id')->constrained('rawdatas')->cascadeOnDelete();
            $table->string('frame_id', 20);
            $table->float('temperature');
            $table->float('humidity');
            $table->integer('period');
            $table->float('rssi');
            $table->float('snr');
            $table->float('battery');
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
        Schema::dropIfExists('parseds');
    }
};

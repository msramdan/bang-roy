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
        Schema::create('latest_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->constrained('devices')->restrictOnUpdate()->cascadeOnDelete();
            $table->foreignId('rawdata_id')->nullable()->constrained('rawdatas')->nullOnDelete();
            $table->string('frame_id', 20)->nullable();
            $table->float('temperature')->nullable();
            $table->float('humidity')->nullable();
            $table->integer('period')->nullable();
            $table->float('rssi')->nullable();
            $table->float('snr')->nullable();
            $table->float('battery')->nullable();
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
        Schema::dropIfExists('latest_datas');
    }
};

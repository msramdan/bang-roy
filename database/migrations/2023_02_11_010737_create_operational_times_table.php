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
        Schema::create('operational_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instance_id')->constrained('instances')->restrictOnUpdate()->cascadeOnDelete();
            $table->string('day', 50);
            $table->time('open_hour')->nullable();
            $table->time('close_hour')->nullable();
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
        Schema::dropIfExists('operational_times');
    }
};

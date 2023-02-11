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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('dev_eui', 200)->nullable();
            $table->string('dev_name', 200)->nullable();
            $table->string('dev_addr', 200)->nullable();
            $table->string('dev_type', 200)->nullable();
            $table->string('region', 200)->nullable();
            $table->foreignId('subnet_id')->nullable()->constrained('subnets')->restrictOnUpdate()->restrictOnDelete();
            $table->string('auth_type', 200);
            $table->string('fcnt', 200)->nullable();
            $table->string('fport', 200)->nullable();
            $table->string('last_seen', 200)->nullable();
            $table->foreignId('instance_id')->nullable()->constrained('instances')->restrictOnUpdate()->restrictOnDelete();
            $table->string('app_eui', 200)->nullable();
            $table->string('app_key', 200)->nullable();
            $table->string('nwk_s_key', 200)->nullable();
            $table->string('support_class_b', 200)->nullable();
            $table->string('support_class_c', 200)->nullable();
            $table->string('mac_version', 200)->nullable();
            $table->foreignId('cluster_id')->nullable()->constrained('clusters')->restrictOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('devices');
    }
};

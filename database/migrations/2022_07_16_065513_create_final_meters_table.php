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
        Schema::create('meters', function (Blueprint $table) {
            $table->unsignedBigInteger("meter_id")->autoIncrement();
            $table->string("meter_name");
            $table->bigInteger("admin_id");
            $table->bigInteger("sale_status");
            $table->bigInteger("charge_rate_id");
            $table->timestamp("created_at")->default(now());
            $table->timestamp("updated_at")->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meters');
    }
};

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
        Schema::create('water_charge_rates', function (Blueprint $table) {
            $table->unsignedBigInteger('rate_id')->autoIncrement();
            $table->string("unit");
            $table->float("unit_cost");
            $table->bigInteger("admin_id")->default(1);
            $table->bigInteger("in_use")->default(0);
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
        //
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\FlareClient\Time\Time;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_consuptions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger("meter_id");
            $table->unsignedDouble("amount");
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
        Schema::dropIfExists('water_consuptions');
    }
};

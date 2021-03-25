<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCPCLSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_p_c_l_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contract_id');
            $table->string('province')->nullable();
            $table->string('districts')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('village')->nullable();
            $table->string('farmers_group_name')->nullable();
            $table->string('chairman_farmers_group_name')->nullable();
            $table->string('nik')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('area_ha')->nullable();
            $table->string('fertilizer')->nullable();
            $table->string('planting_schedule')->nullable();
            $table->string('coordinate_point')->nullable();
            $table->string('type_of_land')->nullable();
            $table->string('scan_bast')->nullable();
            $table->string('scan_of_travel_letters')->nullable();
            $table->string('open_camera_photo')->nullable();
            $table->string('scan_ktp')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_p_c_l_s');
    }
}

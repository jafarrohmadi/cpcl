<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contract_number')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('work_unit')->nullable();
            $table->string('item_position')->nullable();
            $table->string('quality_test')->nullable();
            $table->string('item_receive')->nullable();
            $table->string('contract_value')->nullable();
            $table->string('tax')->nullable();
            $table->string('real_value')->nullable();
            $table->text('billing_progress')->nullable();
            $table->text('type_of_fertilizer')->nullable();
            $table->string('unit_fertilizer')->nullable();
            $table->string('zak_to_kg')->nullable();
            $table->string('number_of_row_cpcl')->nullable();
            $table->string('total_kg_fertilizer')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('contracts');
    }
}

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
        Schema::create('custumers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consumer_id')->default('1'); 
            $table->foreign('consumer_id')->references('id')->on('consumers');
            //b
            $table->string('c_f', 50);
            $table->string('pec', 150)->nullable();
            $table->string('r_s', 150)->nullable();
            $table->string('p_iva', 15)->nullable();
            $table->string('address', 100);
            $table->string('city', 100);
            $table->string('district', 2);
            $table->tinyInteger('type_agency');//(ditta ind. = 1, liber pr = 2, ditta individuale = 3...)
            //c
            $table->text('opening_times')->nullable();
            $table->text('service_times')->nullable();
            $table->text('images_menu')->nullable();
            $table->string('link_menu')->nullable();
            //d
            $table->string('content_plot')->nullable();
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
        Schema::dropIfExists('custumers');
    }
};

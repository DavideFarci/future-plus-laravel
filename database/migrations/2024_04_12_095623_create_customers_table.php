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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            //b
            $table->string('pec', 150);
            $table->string('r_s', 150);
            $table->string('p_iva', 15);
            $table->tinyInteger('type_agency');//(ditta ind. = 1, liber pr = 2, ditta individuale = 3...)
            //c
            $table->string('opening_times');
            $table->string('services_times');
            $table->text('images_menu')->nullable();
            $table->string('link_menu');
            //d
            $table->string('content_plot');
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
        Schema::dropIfExists('customers');
    }
};

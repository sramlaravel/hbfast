<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('loacation_name_ar');
            $table->text('desc_ar');
            $table->integer('phone');
            $table->string('loation_type');
            $table->decimal('lat');
            $table->decimal('lng');
            $table->string('icon');
            $table->string('email');
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
        Schema::dropIfExists('curencies');
    }
}

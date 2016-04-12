<?php

/**
 * Create Locals table
 * @author  Derek Marcinyshyn
 * @date    2016-03-27
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('temp', 5,1);
            $table->smallInteger('humidity');
            $table->smallInteger('relative_humidity');
            $table->decimal('bmp_temperature', 5, 1);
            $table->decimal('barometer', 5, 1);
            $table->string('direction');
            $table->decimal('speed', 5, 1);
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
        Schema::drop('locals');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fertilizers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('nitrogen');
            $table->float('phosphorus');
            $table->float('potassium');

            $table->unsignedBigInteger('culture_id');
            $table->index('culture_id', 'fertilizer_culture_idx');
            $table->foreign('culture_id', 'fertilizer_culture_fk')->on('cultures')->references('id');

            $table->string('district');
            $table->float('price');
            $table->string('description');
            $table->string('target');
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
        Schema::dropIfExists('fertilizers');
    }
}

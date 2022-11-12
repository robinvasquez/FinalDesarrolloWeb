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
        Schema::create('tt_marcaje_detail', function (Blueprint $table) {
            $table->increments('id');
			$table->string('fecha');
			$table->string('hora');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('usuario_id')->on('users');
            $table->unsignedBigInteger('tipo_marcaje_id');
            $table->foreign('tipo_marcaje_id')->references('tipo_marcaje_id')->on('tc_tipo_marcaje');
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tt_marcaje_detail');
    }
};

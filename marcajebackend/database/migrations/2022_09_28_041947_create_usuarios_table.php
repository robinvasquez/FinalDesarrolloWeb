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
        Schema::create('tc_usuario', function (Blueprint $table) {
            $table->bigIncrements('usuario_id');
            $table->string('nombre');
			$table->string('contrasena');
            $table->string('email')->unique();
            $table->tinyinteger('tipo_usuario');
            $table->tinyinteger('estado')->default(1);
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
        Schema::dropIfExists('tc_usuario');
    }
};

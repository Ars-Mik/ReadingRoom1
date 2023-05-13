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

        // Сделать таблицы мосты------------------------------

        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('documentName');
            $table->string('fileName');
            $table->bigInteger('fund_id')->unsigned();            
            $table->date('date')->nullable();
            $table->boolean('access');
            $table->foreign('fund_id')
                ->references('id')
                ->on('funds')
                ->onDelete('restrict')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('documents');
    }
};

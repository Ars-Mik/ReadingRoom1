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
        Schema::create('document_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('numberInventory');
            $table->bigInteger('fund_id')->unsigned();
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
        Schema::dropIfExists('document_inventories');
    }
};

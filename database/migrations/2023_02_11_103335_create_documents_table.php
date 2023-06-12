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
            $table->string('caseNumber');
            $table->string('fileName');
            $table->bigInteger('document_inventory_id')->unsigned();
            $table->bigInteger('document_type_id')->unsigned();
            $table->integer('year')->unsigned();
            $table->integer('month')->nullable()->unsigned();
            $table->integer('day')->nullable()->unsigned();
            $table->boolean('access');
            $table->foreign('document_inventory_id')
                ->references('id')
                ->on('document_inventories')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('document_type_id')
                ->references('id')
                ->on('document_types')
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

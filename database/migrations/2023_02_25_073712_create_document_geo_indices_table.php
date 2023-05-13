<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('document_geo_indices', function (Blueprint $table) {
            $table->bigInteger('document_id')->unsigned();            
            $table->bigInteger('geo_index_id')->unsigned();
            $table->foreign('document_id')
                ->references('id')
                ->on('documents')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('geo_index_id')
                ->references('id')
                ->on('geo_indices')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('document_geo_indices');
    }
};

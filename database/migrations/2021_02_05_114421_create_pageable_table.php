<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pageable', function (Blueprint $table) {
            $table->bigInteger('page_id')->unique();
            $table->bigInteger('pageable_id');
            $table->string('pageable_type');
            $table->string('vue_component');
            $table->string('template');
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
        Schema::dropIfExists('pageable');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('slug_backup')->nullable();
            $table->string('uri')->unique()->nullable();
            $table->string('uri_backup')->nullable();
            $table->string('lock_move')->default(false);
            $table->boolean('hide_submenu')->default(false);
            $table->nestedSet();
            $table->integer('page_type_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('pageable_id')->unsigned()->nullable();
            $table->string('pageable_type')->nullable();
            $table->index(['page_type_id', 'user_id']);
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
        Schema::dropIfExists('pages');
    }
}

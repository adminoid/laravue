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
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('slug_backup')->nullable();
            $table->string('uri')->unique()->nullable();
            $table->string('uri_backup')->nullable();
            $table->string('lock_move')->default(false);
            $table->boolean('hide_submenu')->default(false);
            $table->nestedSet();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('pageable_id');
            $table->string('pageable_type');
            $table->unique(['parent_id', 'slug']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
}

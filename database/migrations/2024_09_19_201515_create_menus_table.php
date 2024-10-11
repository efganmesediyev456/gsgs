<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer("parent_id")->nullable();
            $table->tinyInteger("order")->default(0)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string("slug")->nullable()->unique();
            $table->string("image")->nullable();
            $table->tinyInteger("header_top")->default(0);
            $table->tinyInteger("header")->default(0);
            $table->tinyInteger("footer")->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

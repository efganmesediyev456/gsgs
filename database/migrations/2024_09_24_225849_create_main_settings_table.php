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
        Schema::create('main_settings', function (Blueprint $table) {
            $table->id();
            $table->string("logo")->nullable();
            $table->string("favicon")->nullable();
            $table->string("footer_logo")->nullable();
            $table->string("header_phone")->nullable();
            $table->string("footer_phone")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        \App\Models\Entities\MainSetting::create([
           "logo"=>""
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_settings');
    }
};

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
        Schema::table('main_settings', function (Blueprint $table) {
            $table->string("whatsapp")->nullable()->after("footer_phone");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('main_settings', function (Blueprint $table) {
            $table->dropColumn("whatsapp");
        });
    }
};

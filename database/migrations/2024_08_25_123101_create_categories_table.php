<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // id bigint auto-increment
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('set null'); // parent_id bigint [null]
            $table->string('key'); // key varchar(255)
            $table->string('slug'); // slug varchar(255)
            $table->boolean("status")->default(true);
            $table->integer("order")->default(0);
            $table->timestamps(); // created_at, updated_at timestamp [null]
            $table->softDeletes(); // deleted_at timestamp [null]
            // Indexes
            $table->index(['id', 'parent_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

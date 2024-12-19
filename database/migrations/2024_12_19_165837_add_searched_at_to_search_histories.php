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
        Schema::table('search_histories', function (Blueprint $table) {
            $table->dateTime('searched_at')->default(now())->after('searchable_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('search_histories', function (Blueprint $table) {
            $table->dropColumn('searched_at');
        });
    }
};

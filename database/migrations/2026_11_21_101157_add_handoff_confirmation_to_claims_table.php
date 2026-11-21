<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->timestamp('finder_confirmed_at')->nullable();
            $table->timestamp('claimant_confirmed_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn([
                'finder_confirmed_at',
                'claimant_confirmed_at',
            ]);
        });
    }
};

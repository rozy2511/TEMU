<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->enum('contact_status', [
                'not_requested',
                'pending',
                'approved',
                'rejected'
            ])->default('not_requested');

            $table->timestamp('contact_responded_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn([
                'contact_status',
                'contact_responded_at'
            ]);
        });
    }
};

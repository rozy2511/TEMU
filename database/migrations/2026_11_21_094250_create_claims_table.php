<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();

            $table->foreignId('item_report_id')
                ->constrained('item_reports')
                ->cascadeOnDelete();

            $table->foreignId('claimant_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->text('reason');

            $table->enum('status', [
                'pending',
                'approved',
                'rejected'
            ])->default('pending');

            $table->timestamp('responded_at')->nullable();

            $table->timestamps();

            $table->unique(
                ['item_report_id', 'claimant_id'],
                'claims_report_claimant_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};

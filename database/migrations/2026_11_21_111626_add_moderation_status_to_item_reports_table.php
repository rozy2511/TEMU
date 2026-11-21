<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('item_reports', function (Blueprint $table) {
            $table->enum('moderation_status', [
                'visible',
                'hidden',
            ])->default('visible');

            $table->text('moderation_reason')->nullable();
            $table->foreignId('moderated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('moderated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('item_reports', function (Blueprint $table) {
            $table->dropForeign(['moderated_by']);

            $table->dropColumn([
                'moderation_status',
                'moderation_reason',
                'moderated_by',
                'moderated_at',
            ]);
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('item_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['lost', 'found']);
            $table->string('item_name');
            $table->string('category');
            $table->text('description');
            $table->string('location');
            $table->date('incident_date');
            $table->string('photo')->nullable();
            $table->enum('status', ['active', 'claimed', 'returned'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_reports');
    }
};

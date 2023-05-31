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
        Schema::create('sessions_data', function (Blueprint $table) {
            $table->id();

            $table->dateTime('started_at');

            $table->foreignId('segment_id')
                ->references('id')
                ->on('segments')
                ->onDelete('CASCADE');

            $table->foreignId('session_id')
                ->references('id')
                ->on('sessions')
                ->onDelete('CASCADE');

            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_data');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('assigned_to')->after('completed_at')->index()->nullable();
            $table->foreign('assigned_to')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');

            $table->foreignId('created_by')->after('assigned_to')->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
};

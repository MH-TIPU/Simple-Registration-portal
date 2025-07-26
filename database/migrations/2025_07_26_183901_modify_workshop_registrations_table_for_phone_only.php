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
        Schema::table('workshop_registrations', function (Blueprint $table) {
            // Drop the unique constraint on email
            $table->dropUnique(['email']);
            
            // Make fields nullable
            $table->string('name')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('enterprise_name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workshop_registrations', function (Blueprint $table) {
            // Add back the unique constraint
            $table->unique('email');
            
            // Make fields not nullable again
            $table->string('name')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('enterprise_name')->nullable(false)->change();
        });
    }
};

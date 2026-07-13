<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->after('username');
            $table->string('mkoa')->nullable()->after('role');
            $table->string('wilaya')->nullable()->after('mkoa');
            $table->string('phone_number')->nullable()->after('wilaya');
            $table->string('verification_code')->nullable()->after('phone_number');
            $table->timestamp('phone_verified_at')->nullable()->after('verification_code');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'mkoa', 'wilaya', 'phone_number', 'verification_code', 'phone_verified_at']);
        });
    }
};

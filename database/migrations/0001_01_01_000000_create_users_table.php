<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');

        Schema::create('cancel', function (Blueprint $table) {
            $table->id('id_cancel');
            $table->text('reason')->nullable();
            $table->timestamp('ts_created', 0)->useCurrent();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('email', 128)->unique();
            $table->string('password', 128)->nullable();
            $table->string('google_sub', 128)->unique()->nullable();
            $table->string('name', 128);
            $table->string('picture_url', 255)->nullable();
            $table->uuid('uuid')->default(DB::raw('uuid_generate_v4()'));
            $table->string('token_password', 255)->nullable();
            $table->timestamp('ts_token', 0)->nullable();
            $table->timestamp('ts_created', 0)->useCurrent();
            $table->unsignedBigInteger('id_cancel')->nullable();

            $table->foreign('id_cancel')->references('id_cancel')->on('cancel');
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancel');
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
    }
};

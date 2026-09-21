<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->string('email');
            $table->string('telefone', 20)->nullable();
            $table->string('escola')->nullable();
            $table->string('cargo', 50)->nullable();
            $table->unsignedInteger('quantidade_alunos')->nullable();
            $table->text('mensagem')->nullable();
            $table->string('origem', 50)->nullable();
            $table->string('status', 30)->default('novo');
            $table->string('ip', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};

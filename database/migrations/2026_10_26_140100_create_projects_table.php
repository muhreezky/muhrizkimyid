<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** @var string */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('technologies')->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort')->default(0);
            $table->boolean('published')->default(true);
            $table->timestamps();
        });
    }

    /** @var string */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->text('excerpt')->nullable();
            $table->boolean('published')->default(true);
            $table->integer('sort')->default(0);
            $table->timestamps();
        });
    }

    /** @var string */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

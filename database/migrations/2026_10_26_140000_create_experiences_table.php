<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /** @var string */
    public function up(): void {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company');
            $table->string('position');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('current')->default(false);
            $table->text('description')->nullable();
            $table->integer('sort')->default(0);
            $table->timestamps();
        });
    }

    /** @var string */
    public function down(): void {
        Schema::dropIfExists('experiences');
    }
};
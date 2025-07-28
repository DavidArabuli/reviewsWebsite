<?php

use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Game::class)->nullable()->constrained()->nullOnDelete();
            $table->json('screenshots')->nullable();

            $table->string('title');
            $table->text('content');
            $table->unsignedTinyInteger('score');
            $table->unsignedBigInteger('steam_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

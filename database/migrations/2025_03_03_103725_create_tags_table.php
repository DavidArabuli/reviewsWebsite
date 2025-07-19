<?php

use App\Models\Tag;
use App\Models\Game;
use App\Models\Review;
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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('review_tag', function (Blueprint $table) {
            // $table->id();
            $table->foreignIdFor(Review::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['review_id', 'tag_id']);
        });
        Schema::create('game_tag', function (Blueprint $table) {
            // $table->id();
            $table->foreignIdFor(Game::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['game_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_tag');
        Schema::dropIfExists('review_tag');
        Schema::dropIfExists('tags');
    }
};

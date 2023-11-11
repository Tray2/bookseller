<?php

use App\Models\Condition;
use App\Models\Edition;
use App\Models\Format;
use App\Models\Genre;
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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignIdFor(Edition::class);
            $table->foreignIdFor(Genre::class);
            $table->foreignIdFor(Format::class);
            $table->foreignIdFor(Condition::class);
            $table->timestamp('sold')->nullable();
            $table->string('published');
            $table->string('isbn')->nullable();
            $table->integer('price');
            $table->integer('discounted_price')->nullable();
            $table->longText('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

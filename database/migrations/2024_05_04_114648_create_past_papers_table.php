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
        Schema::create('past_papers', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("paper_url");
            $table->text("year");
            $table->foreignId("subjectId")->references("id")->on("subjects");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_papers');
    }
};

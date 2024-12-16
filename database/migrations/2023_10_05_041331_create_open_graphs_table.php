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
        Schema::create('open_graphs', function (Blueprint $table) {
            $table->id();
            $table->string('tag_name');
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->text('url');
            $table->text('site_name');
            $table->string('type');
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('open_graphs');
    }
};
